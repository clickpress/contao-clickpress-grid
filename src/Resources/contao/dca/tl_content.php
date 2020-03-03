<?php

/**
 * ClickpressGrid DCA
 * Partly taken with friendly permission from RockSolid Columns
 *
 * @author Martin Auswöger <martin@madeyourday.net>
 * @author Stefan Schulz-Lauterbach <ssl@clickpress.de>
 */

if (TL_MODE === 'BE') {
    $GLOBALS['TL_CSS'][] = 'bundles/contaoclickpressgrid/be_main.css';
}

$GLOBALS['TL_DCA']['tl_content']['palettes']['cp_grid_start'] = '{type_legend},type,headline;{cp_grid_legend},cp_grid_mobile,cp_grid_tablet,cp_grid_desktop;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['cp_grid_stop'] = '{type_legend},type;{protected_legend:hide},protected;{expert_legend:hide},guests;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['cp_column_start'] = '{type_legend},type,headline;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['cp_column_stop'] = '{type_legend},type;{protected_legend:hide},protected;{expert_legend:hide},guests;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['fields']['cp_grid_desktop'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['cp_grid_desktop'],
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
        'grid_40_20_20_20',
        'grid_20_40_20_20',
        'grid_20_20_40_20',
        'grid_20_20_20_40',
    ),
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['cp_grid_options'],
    'eval' => array(
        'tl_class' => 'cp_grid_w33',
    ),
    'sql' => "varchar(255) NOT NULL default ''",
);


$GLOBALS['TL_DCA']['tl_content']['fields']['cp_grid_tablet'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['cp_grid_tablet'],
    'inputType' => 'select',
    'options' => array(
        'grid_100',
        'grid_50_50',
        'grid_33_33_33',
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
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['cp_grid_options'],
    'eval' => array(
        'tl_class' => 'cp_grid_w33',
    ),
    'sql' => "varchar(255) NOT NULL default ''",
);


$GLOBALS['TL_DCA']['tl_content']['fields']['cp_grid_mobile'] = array(
    'label' => &$GLOBALS['TL_LANG']['tl_content']['cp_grid_mobile'],
    'inputType' => 'select',
    'options' => array(
        'grid_100',
        'grid_50_50',
        'grid_33_33_33',
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
    'reference' => &$GLOBALS['TL_LANG']['tl_content']['cp_grid_options'],
    'eval' => array(
        'tl_class' => 'cp_grid_w33',
    ),
    'sql' => "varchar(255) NOT NULL default ''",
);
