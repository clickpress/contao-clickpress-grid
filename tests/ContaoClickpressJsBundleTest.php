<?php

/*
 * This file is part of [package name].
 *
 * (c) John Doe
 *
 * @license LGPL-3.0-or-later
 */

namespace StefanSl\ContaoClickpressJsBundle\Tests;

use StefanSl\ContaoClickpressJsBundle\ContaoClickpressGridBundle;
use PHPUnit\Framework\TestCase;

class ContaoClickpressJsBundleTest extends TestCase
{
    public function testCanBeInstantiated()
    {
        $bundle = new ContaoClickpressGridBundle();

        $this->assertInstanceOf('StefanSl\ContaoClickpressJsBundle\ContaoClickpressGridBundle', $bundle);
    }
}
