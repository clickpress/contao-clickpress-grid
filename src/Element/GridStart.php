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

namespace Clickpress\ContaoClickpressGridBundle\Element;

use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsContentElement;
use Contao\CoreBundle\Routing\ScopeMatcher;
use Contao\CoreBundle\Twig\FragmentTemplate;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;

/**
 * Grid start content element Taken with friendly permission from RockSolid Columns.
 */
#[AsContentElement(type: 'cp_grid_start', category: 'cp_grid', template: 'content_element/cp_grid_start')]
class GridStart extends AbstractContentElementController
{
    use GridConfigurationTrait;

    public function __construct(readonly RequestStack $requestStack, readonly ScopeMatcher $scopeMatcher)
    {
    }

    protected function getResponse(FragmentTemplate $template, ContentModel $model, Request $request): Response
    {
        if ($this->scopeMatcher->isBackendRequest($this->requestStack->getCurrentRequest())) {
            return new Response($this->getBackendTitle($model) . '<br>' . $this->getConfigInfo($model));
        }

        $parentKey = ($model->ptable ?: 'tl_article') . '__' . $model->pid;

        $GLOBALS['TL_CP_GRID'][$parentKey] = [
            'active' => true,
            'count' => 0,
            'config' => static::getColumnsConfiguration($model->row()),
        ];

        $template->set('grid_classes', $this->buildGridClasses($model));

        return $template->getResponse();
    }
}
