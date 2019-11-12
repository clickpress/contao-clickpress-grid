<?php

/*
 * This file is part of Contao Clickpress Grid.
 *
 * (c) Stefan Schulz-Lauterbach (https://clickpress.de)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Clickpress\ContaoClickpressGridBundle\EventListener;

use Contao\CoreBundle\ServiceAnnotation\Hook;
use Contao\LayoutModel;
use Contao\PageModel;
use Contao\PageRegular;
use Terminal42\ServiceAnnotationBundle\ServiceAnnotationInterface;

class GeneratePageListener implements ServiceAnnotationInterface
{
    /**
     * @Hook("generatePage")
     */
    public function onGeneratePage(PageModel $pageModel, LayoutModel $layout, PageRegular $pageRegular): void
    {
        // ToDo: add Stylesheet in hook
    }
}
