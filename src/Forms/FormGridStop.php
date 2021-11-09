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

use BackendTemplate;
use Contao\System;
use Contao\Widget;

/**
 * Grid stop content element
 * Taken with friendly permission from RockSolid Columns.
 *
 * @author Martin Auswöger <martin@madeyourday.net>
 * @author Stefan Schulz-Lauterbach <ssl@clickpress.de>
 * @author Jannik Nölke <mail@jaynoe.de>
 */
class FormGridStop extends Widget
{
    /**
     * @var string Template
     */
    protected $strTemplate = 'form_grid_stop';

    /**
     * Do not validate.
     */
    public function validate()
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
