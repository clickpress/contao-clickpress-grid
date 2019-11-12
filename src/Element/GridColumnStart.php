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
        if (TL_MODE === 'BE') {
            return parent::generate();
        }

        $classes = ['cp-column'];
        $parentKey = ($this->arrData['ptable'] ?: 'tl_article') . '__' . $this->arrData['pid'];

        if (isset($GLOBALS['TL_CP_GRID'][$parentKey]) && $GLOBALS['TL_CP_GRID'][$parentKey]['active']) {
            $GLOBALS['TL_CP_GRID'][$parentKey]['active'] = false;
            ++$GLOBALS['TL_CP_GRID'][$parentKey]['count'];

            $count = $GLOBALS['TL_CP_GRID'][$parentKey]['count'];
            foreach ($GLOBALS['TL_CP_GRID'][$parentKey]['config'] as $name => $media) {
                $classes = array_merge($classes, $media[($count - 1) % \count($media)]);
                if ($count - 1 < \count($media)) {
                    $classes[] = '-' . $name . '-first-row';
                }
            }
        } else {
            trigger_error('Missing column wrapper start element before column start element ID ' . $this->id . '.', E_USER_WARNING);
        }

        if (!\is_array($this->cssID)) {
            $this->cssID = ['', ''];
        }
        $this->arrData['cssID'][1] .= ' ' . implode(' ', $classes);

        return parent::generate();
    }

    /**
     * Compile the content element.
     */
    public function compile()
    {
        if (TL_MODE === 'BE') {
            $this->strTemplate = 'be_wildcard';
            $this->Template = new \BackendTemplate($this->strTemplate);
            $this->Template->title = $this->headline;
        } else {
            $this->Template = new \FrontendTemplate($this->strTemplate);
            $this->Template->setData($this->arrData);
        }
    }
}
