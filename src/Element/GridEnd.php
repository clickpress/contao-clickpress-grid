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

class GridEnd extends \ContentElement
{
    /**
     * @var string Template
     */
    protected $strTemplate = 'ce_grid_end';

    /**
     * Parse the template.
     *
     * @return string Parsed element
     */
    public function generate()
    {
        if (TL_MODE === 'BE') {
            return parent::generate();
        }

        return parent::generate();
    }

    /**
     * Compile the content element.
     */
    public function compile()
    {
    }
}
