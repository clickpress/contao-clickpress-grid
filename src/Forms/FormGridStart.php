<?php

/*
 * This file is part of Contao Clickpress Grid.
 *
 * (c) Stefan Schulz-Lauterbach (https://clickpress.de)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Clickpress\ContaoClickpressGridBundle\Forms;

/**
 * Grid start content element
 * Taken with friendly permission from RockSolid Columns.
 *
 * @author Martin Auswöger <martin@madeyourday.net>
 * @author Stefan Schulz-Lauterbach <ssl@clickpress.de>
 * @author Jannik Nölke <mail@jaynoe.de>
 */
class FormGridStart extends \Widget
{
    /**
     * @var string Template
     */
    protected $strTemplate = 'form_grid_start';

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
    public function parse($arrAttributes = null)
    {
        if (TL_MODE === 'BE') {
            $objTemplate = new \BackendTemplate('be_wildcard');

            return $objTemplate->parse();
        }
        $gridClasses = [
                preg_replace('/grid/', 'grid_desktop', $this->form_cp_grid_desktop),
                preg_replace('/grid/', 'grid_tablet', $this->form_cp_grid_tablet),
                preg_replace('/grid/', 'grid_mobile', $this->form_cp_grid_mobile),
            ];
        $arrAttributes['gridClasses'] = implode(' ', $gridClasses);

        return parent::parse($arrAttributes);
    }

    /**
     * Generate the widget and return it as string.
     *
     * @return string The widget markup
     */
    public function generate()
    {
    }
}
