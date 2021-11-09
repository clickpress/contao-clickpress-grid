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

/**
 * Grid start content element
 * Taken with friendly permission from RockSolid Columns.
 *
 * @author Martin Auswöger <martin@madeyourday.net>
 * @author Stefan Schulz-Lauterbach <ssl@clickpress.de>
 */
class GridStart extends ContentElement
{
    /**
     * @var string Template
     */
    protected $strTemplate = 'ce_grid_start';

    /**
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

        $GLOBALS['TL_CP_GRID'][$parentKey] = [
            'active' => true,
            'count' => 0,
            'config' => static::getColumnsConfiguration($this->arrData),
        ];
        $this->arrData['gridClasses'] = implode(' ', $GLOBALS['TL_CP_GRID'][$parentKey]['config']);

        if ($this->cp_grid_valign) {
            $this->arrData['gridClasses'] .= ' ' . $this->cp_grid_valign;
        }

        if ($this->cp_grid_halign) {
            $this->arrData['gridClasses'] .= ' ' . $this->cp_grid_halign;
        }


        return parent::generate();
    }

    /**
     * Generate the columns classes.
     *
     * @param array $data Data array
     */
    public static function getColumnsConfiguration(array $data): array
    {
        $config = [];
        foreach (['desktop', 'tablet', 'mobile'] as $media) {
            if (isset($data['cp_grid_' . $media])) {
                $columns = str_replace("grid", 'grid_' . $media, $data['cp_grid_' . $media]);
                $config[$media] = $columns;
            } else {
                $config[$media] = null;
            }
        }

        return $config;
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
