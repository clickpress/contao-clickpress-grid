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
 * Grid start content element
 * Taken with friendly permission from RockSolid Columns.
 *
 * @author Martin Auswöger <martin@madeyourday.net>
 * @author Stefan Schulz-Lauterbach <ssl@clickpress.de>
 */

#[AsContentElement(type: 'cp_grid_start', category: 'cp_grid', template: 'ce_grid_start')]
class GridStart extends AbstractContentElementController
{
    public function __construct(
        readonly RequestStack $requestStack,
        readonly ScopeMatcher $scopeMatcher,
    ) {
    }

    protected function getResponse(Template $template, ContentModel $model, Request $request): Response
    {

        dump($model->row());

        $configInfo = $this->getConfigInfo($model);

        if ($this->scopeMatcher->isBackendRequest($this->requestStack->getCurrentRequest())) {
            return new Response($configInfo);
        }

        $template->gridClasses = '';

        $parentKey = ($model->ptable ?: 'tl_article') . '__' . $model->pid;

        $GLOBALS['TL_CP_GRID'][$parentKey] = [
            'active' => true,
            'count' => 0,
            'config' => static::getColumnsConfiguration($model->row()),
        ];
        $template->gridClasses = implode(' ', $GLOBALS['TL_CP_GRID'][$parentKey]['config']);

        if ($model->cp_grid_valign) {
            $template->gridClasses .= ' ' . $model->cp_grid_valign;
        }

        if ($model->cp_grid_halign) {
            $template->gridClasses .= ' ' . $model->cp_grid_halign;
        }

        return $template->getResponse();
    }

    /**
     * Generate the columns classes.
     *
     * @param array $data Data array
     */
    public static function getColumnsConfiguration(array $data): array
    {
        $config = [];
        foreach (['desktop', 'tablet', 'mobile'] as $media) {
            $mediaClass = 'cp_grid_' . $media;
            if (isset($data[$mediaClass])) {
                $columns = str_replace("grid", 'grid_' . $media, $data['cp_grid_' . $media]);
                $config[$media] = $columns;
            } else {
                $config[$media] = null;
            }
        }

        return $config;
    }

    private function getConfigInfo(ContentModel $model): string
    {
        $configInfo = '<span style="font-size: .75rem; margin-bottom: 1rem; color: grey;">';

        $configInfo .= sprintf(
            '%s: %s, ',
            $GLOBALS['TL_LANG']['tl_content']['cp_grid_mobile'][0],
            $GLOBALS['TL_LANG']['tl_content']['cp_grid_options'][$model->cp_grid_mobile]
        );

        $configInfo .= sprintf(
            '%s: %s, ',
            $GLOBALS['TL_LANG']['tl_content']['cp_grid_tablet'][0],
            $GLOBALS['TL_LANG']['tl_content']['cp_grid_options'][$model->cp_grid_tablet]
        );

        $configInfo .= sprintf(
            '%s: %s',
            $GLOBALS['TL_LANG']['tl_content']['cp_grid_desktop'][0],
            $GLOBALS['TL_LANG']['tl_content']['cp_grid_options'][$model->cp_grid_desktop]
        );

        $configInfo .= '</span>';

        return $configInfo;
    }
}
