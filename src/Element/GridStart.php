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
use Contao\System;
use Contao\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;

/**
 * Grid start content element Taken with friendly permission from RockSolid Columns.
 */
#[AsContentElement(type: 'cp_grid_start', category: 'cp_grid', template: 'ce_grid_start')]
class GridStart extends AbstractContentElementController
{
    public function __construct(readonly RequestStack $requestStack, readonly ScopeMatcher $scopeMatcher)
    {
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
            $mediaClass = 'cp_grid_'.$media;
            if (isset($data[$mediaClass])) {
                $columns = str_replace('grid', 'grid_'.$media, $data['cp_grid_'.$media]);
                $config[$media] = $columns;
            } else {
                $config[$media] = null;
            }
        }

        return $config;
    }

    /**
     * Generate the device-specific class based on gap presence and type.
     *
     * @param string $deviceType Type of the device (e.g., desktop, tablet, mobile)
     * @param mixed  $gap        Gap information (can be any type depending on its usage)
     *
     * @return string Generated device class
     */
    public function generateGapClass(string $deviceType, string $gap): string
    {
        $gapArray = explode('_', $gap);

        return $gap ? " {$gapArray[0]}_{$deviceType}_{$gapArray[1]} " : '';
    }

    protected function getResponse(Template $template, ContentModel $model, Request $request): Response
    {
        $configInfo = $this->getConfigInfo($model);

        if ($this->scopeMatcher->isBackendRequest($this->requestStack->getCurrentRequest())) {
            return new Response($configInfo);
        }

        $template->gridClasses = '';

        $parentKey = ($model->ptable ?: 'tl_article').'__'.$model->pid;

        $GLOBALS['TL_CP_GRID'][$parentKey] = [
            'active' => true,
            'count' => 0,
            'config' => static::getColumnsConfiguration($model->row()),
        ];
        $template->gridClasses = implode(' ', $GLOBALS['TL_CP_GRID'][$parentKey]['config']);

        if ($model->cp_grid_valign) {
            $template->gridClasses .= ' '.$model->cp_grid_valign;
        }

        if ($model->cp_grid_halign) {
            $template->gridClasses .= ' '.$model->cp_grid_halign;
        }

        $template->gridClasses .= $model->cp_gap_mobile ? $this->generateGapClass('mobile', $model->cp_gap_mobile) : '';
        $template->gridClasses .= $model->cp_gap_tablet ? $this->generateGapClass('tablet', $model->cp_gap_tablet) : '';
        $template->gridClasses .= $model->cp_gap_desktop ? $this->generateGapClass('desktop', $model->cp_gap_desktop) : '';

        return $template->getResponse();
    }

    /**
     * Generates a configuration information string for the given content model.
     *
     * @param ContentModel $model the content model containing configuration information
     *
     * @return string the formatted configuration information string
     */
    private function getConfigInfo(ContentModel $model): string
    {
        System::loadLanguageFile('tl_content');

        $configInfo = '<span class="tl_help">';

        $configInfo .= \sprintf(
            '%s: %s %s, ',
            $GLOBALS['TL_LANG']['tl_content']['cp_grid_mobile'][0],
            $GLOBALS['TL_LANG']['tl_content']['cp_grid_options'][$model->cp_grid_mobile],
            isset($model->cp_gap_mobile) ? $this->formatGapOption($model->cp_gap_mobile) : '',
        );

        $configInfo .= \sprintf(
            '%s: %s %s, ',
            $GLOBALS['TL_LANG']['tl_content']['cp_grid_tablet'][0],
            $GLOBALS['TL_LANG']['tl_content']['cp_grid_options'][$model->cp_grid_tablet],
            isset($model->cp_gap_tablet) ? $this->formatGapOption($model->cp_gap_tablet) : '',
        );

        $configInfo .= \sprintf(
            '%s: %s %s, ',
            $GLOBALS['TL_LANG']['tl_content']['cp_grid_desktop'][0],
            $GLOBALS['TL_LANG']['tl_content']['cp_grid_options'][$model->cp_grid_desktop],
            isset($model->cp_gap_desktop) ? $this->formatGapOption($model->cp_gap_desktop) : '',
        );

        $configInfo .= '</span>';

        return $configInfo;
    }

    /**
     * Format Gap Option.
     */
    private function formatGapOption(string $gap): string
    {
        return !empty($gap) ? '('.$GLOBALS['TL_LANG']['tl_content']['cp_gap_options'][$gap].')' : '';
    }
}
