<?php
/**
 * Hyvä Themes - https://hyva.io
 * Copyright © Hyvä Themes 2022-present. All rights reserved.
 * This product is licensed per Magento install
 * See https://hyva.io/license
 */

declare(strict_types=1);

namespace Hyva\BaseLayoutReset\Plugin;

use Hyva\BaseLayoutReset\Service\CurrentTheme as BaseLayoutResetCurrentTheme;
use Hyva\Theme\Service\CurrentTheme as ThemeModuleCurrentTheme;

class ResetBaseLayoutCurrentThemePlugin
{
    private BaseLayoutResetCurrentTheme $baseLayoutResetCurrentTheme;

    public function __construct(BaseLayoutResetCurrentTheme $currentTheme)
    {
        $this->baseLayoutResetCurrentTheme = $currentTheme;
    }

    /**
     * Return true if the current theme is a descendent of a Hyvä base theme configured in di.xml.
     */
    public function aroundIsHyva(ThemeModuleCurrentTheme $subject, callable $proceed): bool
    {
        return $this->baseLayoutResetCurrentTheme->isHyva();
    }
}
