<?php
/**
 * ClickpressGrid DCA
 * Partly taken with friendly permission from RockSolid Columns
 *
 * @author Martin Auswöger <martin@madeyourday.net>
 * @author Stefan Schulz-Lauterbach <ssl@clickpress.de>
 * @author Jannik Nölke <mail@jaynoe.de>
 */

$GLOBALS['TL_DCA']['tl_form_field']['palettes']['cp_grid_start'] = '{type_legend},type;{form_cp_grid_legend},form_cp_grid_mobile,form_cp_grid_tablet,form_cp_grid_desktop;{expert_legend:hide},class;{invisible_legend:hide},invisible';
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['cp_grid_stop'] = '{type_legend},type;{expert_legend:hide},class;{invisible_legend:hide},invisible';
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['cp_column_start'] = '{type_legend},type,headline;{expert_legend:hide},class;{invisible_legend:hide},invisible';
$GLOBALS['TL_DCA']['tl_form_field']['palettes']['cp_column_stop'] = '{type_legend},type;{expert_legend:hide},class;{invisible_legend:hide},invisible';
$GLOBALS['TL_DCA']['tl_form_field']['fields']['form_cp_grid_desktop'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_form_field']['form_cp_grid_desktop'],
    'inputType' => 'select',
    'options' => array(
        'grid_100',
        'grid_50_50',
        'grid_33_33_33',
        'grid_25_25_25_25',
        'grid_20_20_20_20_20',
        'grid_75_25',
        'grid_25_75',
        'grid_66_33',
        'grid_33_66',
        'grid_50_25_25',
        'grid_25_50_25',
        'grid_25_25_50',
        'grid_40_30_30',
        'grid_30_40_30',
        'grid_30_30_40',
        'grid_20_40_40',
        'grid_40_20_40',
        'grid_40_40_20',
        'grid_40_20_20_20',
        'grid_20_40_20_20',
        'grid_20_20_40_20',
        'grid_20_20_20_40',
    ),
    'reference' => &$GLOBALS['TL_LANG']['tl_form_field']['form_cp_grid_options'],
    'eval' => array(
        'tl_class' => 'w33',
    ),
    'sql' => "varchar(255) NOT NULL default ''",
);


$GLOBALS['TL_DCA']['tl_form_field']['fields']['form_cp_grid_tablet'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_form_field']['form_cp_grid_tablet'],
    'inputType' => 'select',
    'options' => array(
        'grid_100',
        'grid_50_50',
        'grid_33_33_33',
        'grid_25_25_25_25',
        'grid_75_25',
        'grid_25_75',
        'grid_66_33',
        'grid_33_66',
        'grid_50_25_25',
        'grid_25_50_25',
        'grid_25_25_50',
        'grid_40_30_30',
        'grid_30_40_30',
        'grid_30_30_40',
        'grid_20_40_40',
        'grid_40_20_40',
        'grid_40_40_20',
    ),
    'reference' => &$GLOBALS['TL_LANG']['tl_form_field']['form_cp_grid_options'],
    'eval' => array(
        'tl_class' => 'w33',
    ),
    'sql' => "varchar(255) NOT NULL default ''",
);


$GLOBALS['TL_DCA']['tl_form_field']['fields']['form_cp_grid_mobile'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_form_field']['form_cp_grid_mobile'],
    'inputType' => 'select',
    'options' => array(
        'grid_100',
        'grid_50_50',
        'grid_33_33_33',
        'grid_25_25_25_25',
        'grid_75_25',
        'grid_25_75',
        'grid_66_33',
        'grid_33_66',
        'grid_50_25_25',
        'grid_25_50_25',
        'grid_25_25_50',
        'grid_40_30_30',
        'grid_30_40_30',
        'grid_30_30_40',
    ),
    'reference' => &$GLOBALS['TL_LANG']['tl_form_field']['form_cp_grid_options'],
    'eval' => array(
        'tl_class' => 'w33',
    ),
    'sql' => "varchar(255) NOT NULL default ''",
);
