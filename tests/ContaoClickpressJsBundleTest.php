<?php

/*
 * This file is part of Contao Clickpress Grid.
 *
 * (c) Stefan Schulz-Lauterbach (https://clickpress.de)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace StefanSl\ContaoClickpressJsBundle\Tests;

use PHPUnit\Framework\TestCase;
use StefanSl\ContaoClickpressJsBundle\ContaoClickpressGridBundle;

class ContaoClickpressJsBundleTest extends TestCase
{
    public function testCanBeInstantiated()
    {
        $bundle = new ContaoClickpressGridBundle();

        $this->assertInstanceOf('StefanSl\ContaoClickpressJsBundle\ContaoClickpressGridBundle', $bundle);
    }
}
