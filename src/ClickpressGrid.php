<?php

/*
 * This file is part of Contao Clickpress Grid.
 *
 * (c) Stefan Schulz-Lauterbach (https://clickpress.de)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Clickpress\ContaoClickpressGridBundle;

class ClickpressGrid
{
    public function generateOptions($device)
    {
        $prefix = 'grid_' . $device . '_';
        $gridOptions = [
            $prefix . '100' => '1 Spalte',
            $prefix . '50_50' => '2 Spalten',
            $prefix . '33_33_33' => '3 Spalten',
            $prefix . '75_25' => '2 Spalten - aufgeteilt in 75% 25%',
            $prefix . '25_75' => '2 Spalten - aufgeteilt in 25% 75%',
            $prefix . '66_33' => '2 Spalten - aufgeteilt in 66% 33%',
            $prefix . '33_66' => '2 Spalten - aufgeteilt in 33% 66%',
            $prefix . '50_25_25' => '3 Spalten - aufgeteilt in 50% 25% 25%',
            $prefix . '40_30_30' => '3 Spalten - aufgeteilt in 40% 30% 30%',
        ];

        return $gridOptions;
    }
}
