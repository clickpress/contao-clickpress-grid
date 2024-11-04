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

namespace Clickpress\ContaoClickpressGridBundle\Forms;

use Contao\BackendTemplate;
use Contao\System;
use Contao\Widget;

/**
 * Grid start content element Taken with friendly permission from RockSolid Columns.
 */
class FormGridStart extends Widget
{
    /**
     * @var string Template
     */
    protected $strTemplate = 'form_grid_start';

    /**
     * Do not validate.
     */
    public function validate(): void
    {
    }

    /**
     * Parse the template file and return it as string.
     *
     * @param array $arrAttributes An optional attributes array
     *
     * @return string The template markup
     */
    public function parse($arrAttributes = null): string
    {
        $request = System::getContainer()->get('request_stack')->getCurrentRequest();
        if ($request && System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request)) {
            $objTemplate = new BackendTemplate('be_wildcard');

            return $objTemplate->parse();
        }
        $gridClasses = [
            str_replace('grid', 'grid_desktop', $this->form_cp_grid_desktop),
            str_replace('grid', 'grid_tablet', $this->form_cp_grid_tablet),
            str_replace('grid', 'grid_mobile', $this->form_cp_grid_mobile),
        ];
        $arrAttributes['gridClasses'] = implode(' ', $gridClasses);

        return parent::parse($arrAttributes);
    }

    /**
     * Generate the widget and return it as string.
     *
     * @return string The widget markup
     */
    public function generate(): string
    {
        return '';
    }
}
