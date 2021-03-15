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
 * Column start content element
 * Taken with friendly permission from RockSolid Columns.
 *
 * @author Martin Auswöger <martin@madeyourday.net>
 * @author Stefan Schulz-Lauterbach <ssl@clickpress.de>
 */
class GridColumnStart extends \ContentElement
{
    /**
     * @var string Template
     */
    protected $strTemplate = 'ce_grid_column_start';

    /**
     * Parse the template.
     *
     * @return string Parsed element
     */
    public function generate()
    {
        return parent::generate();
    }

    /**
     * Compile the content element.
     */
    public function compile()
    {

        $request = System::getContainer()->get('request_stack')->getCurrentRequest();

        if ($request && System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request))
            $this->strTemplate = 'be_wildcard';
            $this->Template = new \BackendTemplate($this->strTemplate);
            $this->Template->title = $this->headline;
        } else {
            $this->Template = new \FrontendTemplate($this->strTemplate);
            $this->Template->setData($this->arrData);
        }
    }
}
