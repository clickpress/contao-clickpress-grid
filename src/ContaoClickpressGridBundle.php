<?php

declare(strict_types=1);

/*
 * This file is part of Contao Clickpress Grid.
 *
 * @author Stefan Schulz-Lauterbach <ssl@clickpress.de>
 * @author Martin Auswöger <martin@madeyourday.net>
 * @author Jannik Nölke <mail@jaynoe.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Clickpress\ContaoClickpressGridBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class ContaoClickpressGridBundle extends AbstractBundle
{
    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        $container->import('../config/services.yaml');
    }
}
