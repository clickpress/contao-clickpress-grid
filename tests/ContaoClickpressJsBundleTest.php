<?php

/*
 * This file is part of Contao Clickpress Grid.
 *
 * (c) Stefan Schulz-Lauterbach (https://clickpress.de)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Clickpress\ContaoClickpressGridBundle\Tests;

use Clickpress\ClickpressGridBundle\ContaoClickpressGridBundle;
use PHPUnit\Framework\TestCase;

class ContaoClickpressJsBundleTest extends TestCase
{
    public function testCanBeInstantiated()
    {
        $bundle = new ContaoClickpressGridBundle();

        $this->assertInstanceOf('Clickpress\ContaoClickpressGridBundle\ContaoClickpressGridBundle', $bundle);
    }
}
