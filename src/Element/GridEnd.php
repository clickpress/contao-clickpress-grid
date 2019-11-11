<?php

namespace Clickpress\ContaoClickpressGridBundle\Element;

class GridEnd extends \ContentElement
{
    /**
     * @var string Template
     */
    protected $strTemplate = 'ce_grid_end';

    /**
     * Parse the template
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
     * Compile the content element
     *
     * @return void
     */
    public function compile()
    {

    }
}
