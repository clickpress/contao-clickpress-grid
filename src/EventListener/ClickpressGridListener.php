<?php

declare(strict_types=1);

/*
 * This file is part of Contao Clickpress Grid.
 *
 * (c) Stefan Schulz-Lauterbach (https://clickpress.de)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Clickpress\ContaoClickpressGridBundle\EventListener;

use Contao\CoreBundle\DependencyInjection\Attribute\AsCallback;
use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Contao\Database;
use Contao\DataContainer;
use Contao\LayoutModel;
use Contao\PageModel;
use Contao\PageRegular;

/**
 * ClickpressGridListener Taken with friendly permission from RockSolid Columns.
 *
 * Provide miscellaneous methods that are used by the data configuration arrays.
 */
class ClickpressGridListener
{
    #[AsHook('generatePage')]
    public function onGeneratePage(PageModel $pageModel, LayoutModel $layout, PageRegular $pageRegular): void
    {
        if ($layout->cp_grid_load_css) {
            $GLOBALS['TL_CSS'][] = 'bundles/contaoclickpressgrid/clickpress-grid.css||static';
        }
    }

    /**
     * tl_content DCA onsubmit callback.
     *
     * Creates a stop element after a start element was created
     */
    #[AsCallback(table: 'tl_content', target: 'config.onsubmit')]
    public function onsubmitCallback(DataContainer $dc): void
    {
        $activeRecord = $dc->activeRecord;
        if (!$activeRecord) {
            return;
        }

        if ('cp_grid_start' === $activeRecord->type || 'cp_column_start' === $activeRecord->type) {
            // Find the next columns or column element
            $nextElement = Database::getInstance()
                ->prepare('
					SELECT type
					FROM tl_content
					WHERE pid = ?
						AND (ptable = ? OR ptable = ?)
						AND type IN (\'cp_column_start\', \'cp_column_stop\', \'cp_grid_start\', \'cp_grid_stop\')
						AND sorting > ?
					ORDER BY sorting
					LIMIT 1
				')
                ->execute(
                    $activeRecord->pid,
                    $activeRecord->ptable ?: 'tl_article',
                    'tl_article' === $activeRecord->ptable ? '' : $activeRecord->ptable,
                    $activeRecord->sorting,
                )
            ;

            // Check if a stop element should be created
            if (
                !$nextElement->type
                || ('cp_grid_start' === $activeRecord->type && 'cp_column_stop' === $nextElement->type)
                || ('cp_column_start' === $activeRecord->type && (
                    'cp_column_start' === $nextElement->type || 'cp_grid_stop' === $nextElement->type
                ))
            ) {
                $set = [];

                // Get all default values for the new entry
                foreach ($GLOBALS['TL_DCA']['tl_content']['fields'] as $field => $config) {
                    if (\array_key_exists('default', $config)) {
                        $set[$field] = \is_array($config['default']) ? serialize($config['default']) : $config['default'];
                    }
                }

                $set['pid'] = $activeRecord->pid;
                $set['ptable'] = $activeRecord->ptable ?: 'tl_article';
                $set['type'] = substr($activeRecord->type, 0, -5).'stop';
                $set['sorting'] = $activeRecord->sorting + 1;
                $set['invisible'] = $activeRecord->invisible;
                $set['start'] = $activeRecord->start;
                $set['stop'] = $activeRecord->stop;
                $set['tstamp'] = time();

                Database::getInstance()
                    ->prepare('INSERT INTO tl_content %s')
                    ->set($set)
                    ->execute()
                ;
            }
        }
    }
}
