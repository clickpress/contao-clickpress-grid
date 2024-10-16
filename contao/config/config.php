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

use Clickpress\ContaoClickpressGridBundle\Element\GridColumnStart;
use Clickpress\ContaoClickpressGridBundle\Element\GridStart;
use Clickpress\ContaoClickpressGridBundle\Element\GridStop;
use Clickpress\ContaoClickpressGridBundle\Forms\FormGridColumnStart;
use Clickpress\ContaoClickpressGridBundle\Forms\FormGridStart;
use Clickpress\ContaoClickpressGridBundle\Forms\FormGridStop;

$GLOBALS['TL_CTE']['cp_grid']['cp_grid_start'] = GridStart::class;
$GLOBALS['TL_CTE']['cp_grid']['cp_grid_stop'] = GridStop::class;
$GLOBALS['TL_CTE']['cp_grid']['cp_column_start'] = GridColumnStart::class;
$GLOBALS['TL_CTE']['cp_grid']['cp_column_stop'] = GridColumnStart::class;

$GLOBALS['TL_WRAPPERS']['start'][] = 'cp_grid_start';
$GLOBALS['TL_WRAPPERS']['stop'][] = 'cp_grid_stop';
$GLOBALS['TL_WRAPPERS']['start'][] = 'cp_column_start';
$GLOBALS['TL_WRAPPERS']['stop'][] = 'cp_column_stop';

$GLOBALS['TL_FFL']['cp_grid_start'] = FormGridStart::class;
$GLOBALS['TL_FFL']['cp_grid_stop'] = FormGridStop::class;
$GLOBALS['TL_FFL']['cp_column_start'] = FormGridColumnStart::class;
$GLOBALS['TL_FFL']['cp_column_stop'] = FormGridColumnStart::class;
