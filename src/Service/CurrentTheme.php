<?php
/**
 * Hyvä Themes - https://hyva.io
 * Copyright © Hyvä Themes 2020-present. All rights reserved.
 * This product is licensed per Magento install
 * See https://hyva.io/license
 */

declare(strict_types=1);

namespace Hyva\BaseLayoutReset\Service;

use Magento\Framework\View\DesignInterface;

/**
 * Provides information about the current theme.
 */
class CurrentTheme
{
    protected DesignInterface $viewDesign;

    private HyvaThemes $hyvaThemes;

    public function __construct(
        DesignInterface $viewDesign,
        HyvaThemes $hyvaThemes
    ) {
        $this->viewDesign = $viewDesign;
        $this->hyvaThemes = $hyvaThemes;
    }

    /**
     * Returns true if the current theme is a Hyvä theme, i.e. is a descendant of a theme configured in di.xml.
     *
     * Because Hyvä themes no longer need to inherit from Hyva/reset, a configuration based approach is used instead.
     */
    public function isHyva(): bool
    {
        $currentTheme = $this->viewDesign->getDesignTheme();
        return $this->hyvaThemes->isHyvaTheme($currentTheme);
    }
}
