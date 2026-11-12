<?php

declare(strict_types=1);

/*
 * This file is part of Contao Clickpress Grid.
 *
 * @author Stefan Schulz-Lauterbach <ssl@clickpress.de>
 * @author Martin Auswöger <martin@madeyourday.net>
 * @author Jannik Nölke <mail@jaynoe.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Clickpress\ContaoClickpressGridBundle\Element;

use Contao\ContentModel;
use Contao\StringUtil;
use Contao\System;

/**
 * Shared grid configuration logic for the "Gridset start" and "Grid group"
 * content elements.
 */
trait GridConfigurationTrait
{
    /**
     * Generate the columns classes.
     *
     * @param array $data Data array
     */
    public static function getColumnsConfiguration(array $data): array
    {
        $config = [];

        foreach (['desktop', 'tablet', 'mobile'] as $media) {
            $mediaClass = 'cp_grid_' . $media;

            if (isset($data[$mediaClass])) {
                $config[$media] = str_replace('grid', 'grid_' . $media, $data[$mediaClass]);
            } else {
                $config[$media] = null;
            }
        }

        return $config;
    }

    /**
     * Generate the device-specific gap class.
     *
     * @param string $deviceType Type of the device (e.g. desktop, tablet, mobile)
     * @param string $gap        Gap option (e.g. gap_4)
     */
    public function generateGapClass(string $deviceType, string $gap): string
    {
        $gapArray = explode('_', $gap);

        return $gap ? " {$gapArray[0]}_{$deviceType}_{$gapArray[1]} " : '';
    }

    /**
     * Build the CSS classes of the grid container.
     */
    protected function buildGridClasses(ContentModel $model): string
    {
        $gridClasses = implode(' ', array_filter(static::getColumnsConfiguration($model->row())));

        if ($model->cp_grid_valign) {
            $gridClasses .= ' ' . $model->cp_grid_valign;
        }

        if ($model->cp_grid_halign) {
            $gridClasses .= ' ' . $model->cp_grid_halign;
        }

        $gridClasses .= $model->cp_gap_mobile ? $this->generateGapClass('mobile', $model->cp_gap_mobile) : '';
        $gridClasses .= $model->cp_gap_tablet ? $this->generateGapClass('tablet', $model->cp_gap_tablet) : '';
        $gridClasses .= $model->cp_gap_desktop ? $this->generateGapClass('desktop', $model->cp_gap_desktop) : '';

        return trim(preg_replace('/\s+/', ' ', $gridClasses));
    }

    /**
     * Title shown in the back end listing (title field wins over headline).
     */
    protected function getBackendTitle(ContentModel $model): string
    {
        $listingTitle = '';

        if ($model->headline) {
            $headline = StringUtil::deserialize($model->headline, true);
            $listingTitle = $headline['value'] ?? '';
        }

        if ($model->title) {
            $listingTitle = $model->title;
        }

        return $listingTitle;
    }

    /**
     * Generates a configuration information string for the back end listing.
     */
    protected function getConfigInfo(ContentModel $model): string
    {
        System::loadLanguageFile('tl_content');

        $configInfo = '<span class="tl_help">';

        foreach (['mobile', 'tablet', 'desktop'] as $media) {
            $configInfo .= \sprintf(
                '%s: %s %s, ',
                $GLOBALS['TL_LANG']['tl_content']['cp_grid_' . $media][0] ?? $media,
                $GLOBALS['TL_LANG']['tl_content']['cp_grid_options'][$model->{'cp_grid_' . $media}] ?? '',
                $this->formatGapOption((string) $model->{'cp_gap_' . $media}),
            );
        }

        return $configInfo . '</span>';
    }

    private function formatGapOption(string $gap): string
    {
        if ('' === $gap) {
            return '';
        }

        return '(' . ($GLOBALS['TL_LANG']['tl_content']['cp_gap_options'][$gap] ?? $gap) . ')';
    }
}
