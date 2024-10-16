<?php

$GLOBALS['TL_DCA']['tl_layout']['palettes']['default'] .= ';{cp_grid_legend},cp_grid_load_css';

$GLOBALS['TL_DCA']['tl_layout']['fields']['cp_grid_load_css'] = array(
    'inputType' => 'checkbox',
    'label' => &$GLOBALS['TL_LANG']['tl_layout']['cp_grid_load_css'],
    'sql' => "char(1) NOT NULL default '1'",
);
