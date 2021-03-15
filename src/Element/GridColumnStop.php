<?php

/*
 * This file is part of Contao Clickpress Grid.
 *
 * (c) Stefan Schulz-Lauterbach (https://clickpress.de)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Clickpress\ContaoClickpressGridBundle\Element;

use Contao\System;

/**
 * Column stop content element
 * Taken with friendly permission from RockSolid Columns.
 *
 * @author Martin Auswöger <martin@madeyourday.net>
 * @author Stefan Schulz-Lauterbach <ssl@clickpress.de>
 */
class GridColumnStop extends \ContentElement
{
    /**
     * @var string Template
     */
    protected $strTemplate = 'ce_grid_column_stop';

    /**
     * Parse the template.
     *
     * @return string Parsed element
     */
    public function generate()
    {
        $request = System::getContainer()->get('request_stack')->getCurrentRequest();

        if ($request && System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request)) {
            return parent::generate();
        }

        $parentKey = ($this->arrData['ptable'] ?: 'tl_article') . '__' . $this->arrData['pid'];
        if (isset($GLOBALS['TL_CP_GRID'][$parentKey]) && !$GLOBALS['TL_CP_GRID'][$parentKey]['active']) {
            $GLOBALS['TL_CP_GRID'][$parentKey]['active'] = true;
        }

        return parent::generate();
    }

    /**
     * Compile the content element.
     */
    public function compile()
    {
        $request = System::getContainer()->get('request_stack')->getCurrentRequest();

        if ($request && System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request)) {
            $this->strTemplate = 'be_wildcard';
            $this->Template = new \BackendTemplate($this->strTemplate);
            $this->Template->title = $this->headline;
        } else {
            $this->Template = new \FrontendTemplate($this->strTemplate);
            $this->Template->setData($this->arrData);
        }
    }
}
