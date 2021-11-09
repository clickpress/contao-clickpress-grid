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

namespace Clickpress\ContaoClickpressGridBundle\Element;

use Contao\BackendTemplate;
use Contao\ContentElement;
use Contao\FrontendTemplate;
use Contao\System;
use const E_USER_WARNING;

/**
 * Grid stop content element
 * Taken with friendly permission from RockSolid Columns.
 *
 * @author Martin Auswöger <martin@madeyourday.net>
 * @author Stefan Schulz-Lauterbach <ssl@clickpress.de>
 */
class GridStop extends ContentElement
{
    /**
     * @var string Template
     */
    protected $strTemplate = 'ce_grid_stop';

    /**
     * /**
     * Parse the template.
     *
     * @return string Parsed element
     */
    public function generate(): string
    {
        $request = System::getContainer()->get('request_stack')->getCurrentRequest();

        if ($request && System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request)) {
            return parent::generate();
        }

        $parentKey = ($this->arrData['ptable'] ?: 'tl_article') . '__' . $this->arrData['pid'];

        if (isset($GLOBALS['TL_CP_GRID'][$parentKey])) {
            if (!$GLOBALS['TL_CP_GRID'][$parentKey]['active']) {
                trigger_error(
                    'Missing column stop element before column wrapper stop element ID ' . $this->id . '.',
                    E_USER_WARNING
                );
            }
            unset($GLOBALS['TL_CP_GRID'][$parentKey]);
        }

        $htmlSuffix = '';

        if (!empty($GLOBALS['TL_CP_GRID_STACK'][$parentKey])) {
            $GLOBALS['TL_CP_GRID'][$parentKey] = array_pop($GLOBALS['TL_CP_GRID_STACK'][$parentKey]);
            if ($GLOBALS['TL_CP_GRID'][$parentKey]['active']) {
                $htmlSuffix .= '</div>';
            }
        }

        return parent::generate() . $htmlSuffix;
    }

    /**
     * Compile the content element.
     */
    public function compile(): void
    {
        $request = System::getContainer()->get('request_stack')->getCurrentRequest();

        if ($request && System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request)) {
            $this->strTemplate = 'be_wildcard';
            $this->Template = new BackendTemplate($this->strTemplate);
            $this->Template->title = $this->headline;
        } else {
            $this->Template = new FrontendTemplate($this->strTemplate);
            $this->Template->setData($this->arrData);
        }
    }
}
