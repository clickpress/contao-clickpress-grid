<?php

declare(strict_types=1);

/*
 * This file is part of Contao Clickpress Grid.
 *
 * (c) Stefan Schulz-Lauterbach (https://clickpress.de)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Clickpress\ContaoClickpressGridBundle\Element;

use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsContentElement;
use Contao\CoreBundle\Routing\ScopeMatcher;
use Contao\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;

/**
 * Column stop content element Taken with friendly permission from RockSolid Columns.
 */
#[AsContentElement(type: 'cp_column_stop', category: 'cp_grid', template: 'ce_grid_column_stop')]
class GridColumnStop extends AbstractContentElementController
{
    public function __construct(readonly RequestStack $requestStack, readonly ScopeMatcher $scopeMatcher)
    {
    }

    protected function getResponse(Template $template, ContentModel $model, Request $request): Response
    {
        if ($this->scopeMatcher->isBackendRequest($this->requestStack->getCurrentRequest())) {
            return new Response('');
        }

        $parentKey = ($model->ptable ?: 'tl_article').'__'.$model->pid;
        if (isset($GLOBALS['TL_CP_GRID'][$parentKey]) && !$GLOBALS['TL_CP_GRID'][$parentKey]['active']) {
            $GLOBALS['TL_CP_GRID'][$parentKey]['active'] = true;
        }

        return $template->getResponse();
    }
}
