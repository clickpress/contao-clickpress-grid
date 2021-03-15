<?php

/*
 * This file is part of Contao Clickpress Grid.
 *
 * (c) Stefan Schulz-Lauterbach (https://clickpress.de)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Taken with friendly permission from RockSolid Columns
 *
 * @author Martin Auswöger <martin@madeyourday.net>
 * @author Stefan Schulz-Lauterbach <ssl@clickpress.de>
 * @author Jannik Nölke <mail@jaynoe.de>
 */

$GLOBALS['TL_CTE']['cp_grid']['cp_grid_start'] = 'Clickpress\\ContaoClickpressGridBundle\\Element\\GridStart';
$GLOBALS['TL_CTE']['cp_grid']['cp_grid_stop'] = 'Clickpress\\ContaoClickpressGridBundle\\Element\\GridStop';
$GLOBALS['TL_CTE']['cp_grid']['cp_column_start'] = 'Clickpress\\ContaoClickpressGridBundle\\Element\\GridColumnStart';
$GLOBALS['TL_CTE']['cp_grid']['cp_column_stop'] = 'Clickpress\\ContaoClickpressGridBundle\\Element\\GridColumnStop';

$GLOBALS['TL_WRAPPERS']['start'][] = 'cp_grid_start';
$GLOBALS['TL_WRAPPERS']['stop'][] = 'cp_grid_stop';
$GLOBALS['TL_WRAPPERS']['start'][] = 'cp_column_start';
$GLOBALS['TL_WRAPPERS']['stop'][] = 'cp_column_stop';

$GLOBALS['TL_FFL']['cp_grid_start'] = 'Clickpress\\ContaoClickpressGridBundle\\Forms\\FormGridStart';
$GLOBALS['TL_FFL']['cp_grid_stop'] = 'Clickpress\\ContaoClickpressGridBundle\\Forms\\FormGridStop';
$GLOBALS['TL_FFL']['cp_column_start'] = 'Clickpress\\ContaoClickpressGridBundle\\Forms\\FormGridColumnStart';
$GLOBALS['TL_FFL']['cp_column_stop'] = 'Clickpress\\ContaoClickpressGridBundle\\Forms\\FormGridColumnStop';
