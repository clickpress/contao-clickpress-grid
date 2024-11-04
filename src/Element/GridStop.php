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
use Contao\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;

/**
 * Grid stop content element Taken with friendly permission from RockSolid Columns.
 */
#[AsContentElement(type: 'cp_grid_stop', category: 'cp_grid', template: 'ce_grid_stop')]
class GridStop extends AbstractContentElementController
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

        if (isset($GLOBALS['TL_CP_GRID'][$parentKey])) {
            if (!$GLOBALS['TL_CP_GRID'][$parentKey]['active']) {
                trigger_error(
                    'Missing column stop element before column wrapper stop element ID '.$model->id.'.',
                    E_USER_WARNING,
                );
            }
            unset($GLOBALS['TL_CP_GRID'][$parentKey]);
        }

        $htmlSuffix = '';

        if (!empty($GLOBALS['TL_CP_GRID_STACK'][$parentKey])) {
            $GLOBALS['TL_CP_GRID'][$parentKey] = array_pop($GLOBALS['TL_CP_GRID_STACK'][$parentKey]);
            if ($GLOBALS['TL_CP_GRID'][$parentKey]['active']) {
                $htmlSuffix .= '</div>';
            }
        }

        return $template->getResponse();
    }
}
