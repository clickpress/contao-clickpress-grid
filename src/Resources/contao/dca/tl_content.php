<?php

if (TL_MODE === 'BE') {
    $GLOBALS['TL_CSS'][] = 'bundles/contaoclickpressgrid/be_main.css';
}
//$GLOBALS['TL_DCA']['tl_content']['config']['onsubmit_callback'][] = array('MadeYourDay\\RockSolidColumns\\Columns', 'onsubmitCallback');
$GLOBALS['TL_DCA']['tl_content']['palettes']['cp_grid_start'] = '{type_legend},type,headline;{cp_grid_legend},cp_grid_mobile,cp_grid_tablet,cp_grid_desktop;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['cp_grid_stop'] = '{type_legend},type;{protected_legend:hide},protected;{expert_legend:hide},guests;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['rs_column_start'] = '{type_legend},type,headline;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['palettes']['rs_column_stop'] = '{type_legend},type;{protected_legend:hide},protected;{expert_legend:hide},guests;{invisible_legend:hide},invisible,start,stop';
$GLOBALS['TL_DCA']['tl_content']['fields']['cp_grid_desktop'] = array(
    'inputType' => 'select',
    'options' => array(
        'grid_desktop_100' => '1 Spalte',
        'grid_desktop_50_50' => '2 Spalten',
        'grid_desktop_33_33_33' => '3 Spalten',
        'grid_desktop_75_25' => '2 Spalten - aufgeteilt in 75% 25%',
        'grid_desktop_25_75' => '2 Spalten - aufgeteilt in 25% 75%',
        'grid_desktop_66_33' => '2 Spalten - aufgeteilt in 66% 33%',
        'grid_desktop_33_66' => '2 Spalten - aufgeteilt in 33% 66%',
        'grid_desktop_50_25_25' => '3 Spalten - aufgeteilt in 50% 25% 25%',
        'grid_desktop_40_30_30' => '3 Spalten - aufgeteilt in 40% 30% 30%',
    ),
    'label' => &$GLOBALS['TL_LANG']['tl_content']['cp_grid_desktop'],
    'eval' => array(
        'tl_class' => 'cp_grid_w33',
    ),
    'sql' => "varchar(255) NOT NULL default ''",
);


$GLOBALS['TL_DCA']['tl_content']['fields']['cp_grid_tablet'] = array(
    'inputType' => 'select',
    'options' => array(
        'grid_tablet_100' => '1 Spalte',
        'grid_tablet_50_50' => '2 Spalten',
        'grid_tablet_33_33_33' => '3 Spalten',
        'grid_tablet_75_25' => '2 Spalten - aufgeteilt in 75% 25%',
        'grid_tablet_25_75' => '2 Spalten - aufgeteilt in 25% 75%',
        'grid_tablet_66_33' => '2 Spalten - aufgeteilt in 66% 33%',
        'grid_tablet_33_66' => '2 Spalten - aufgeteilt in 33% 66%',
        'grid_tablet_50_25_25' => '3 Spalten - aufgeteilt in 50% 25% 25%',
        'grid_tablet_40_30_30' => '3 Spalten - aufgeteilt in 40% 30% 30%',
    ),
    'label' => &$GLOBALS['TL_LANG']['tl_content']['cp_grid_tablet'],
    'eval' => array(
        'tl_class' => 'cp_grid_w33',
    ),
    'sql' => "varchar(255) NOT NULL default ''",
);


$GLOBALS['TL_DCA']['tl_content']['fields']['cp_grid_mobile'] = array(
    'inputType' => 'select',
    'options' => array(
        'grid_mobile_100' => '1 Spalte',
        'grid_mobile_50_50' => '2 Spalten',
        'grid_mobile_33_33_33' => '3 Spalten',
        'grid_mobile_75_25' => '2 Spalten - aufgeteilt in 75% 25%',
        'grid_mobile_25_75' => '2 Spalten - aufgeteilt in 25% 75%',
        'grid_mobile_66_33' => '2 Spalten - aufgeteilt in 66% 33%',
        'grid_mobile_33_66' => '2 Spalten - aufgeteilt in 33% 66%',
        'grid_mobile_50_25_25' => '3 Spalten - aufgeteilt in 50% 25% 25%',
        'grid_mobile_40_30_30' => '3 Spalten - aufgeteilt in 40% 30% 30%',
    ),
    'label' => &$GLOBALS['TL_LANG']['tl_content']['cp_grid_mobile'],
    'eval' => array(
        'tl_class' => 'cp_grid_w33',
    ),
    'sql' => "varchar(255) NOT NULL default ''",
);
