<?php
/**
 * Hyvä Themes - https://hyva.io
 * Copyright © Hyvä Themes 2022-present. All rights reserved.
 * This product is licensed per Magento install
 * See https://hyva.io/license
 */

declare(strict_types=1);

namespace Hyva\BaseLayoutReset\Service;

use Magento\Framework\View\Design\ThemeInterface;
use function array_map as map;

/**
 * Hyvä base themes are configured in di.xml as constructor arguments to this class.
 * These themes as well as any theme inheriting from them is considered a Hyvä theme.
 */
class HyvaThemes
{
    /**
     * @var string[]
     */
    private $hyvaBaseThemes;

    private $memoizedThemes = [];

    public function __construct(
        array $hyvaBaseThemes
    ) {
        $this->hyvaBaseThemes = $hyvaBaseThemes;
    }

    public function isHyvaTheme(ThemeInterface $theme): bool
    {
        $id = (int) $theme->getId();
        if (!isset($this->memoizedThemes[$id])) {
            $inheritanceHierarchy = $this->getThemeHierarchy($theme);
            $this->memoizedThemes[$id] = count(array_intersect($inheritanceHierarchy, $this->hyvaBaseThemes)) > 0;
        }
        return $this->memoizedThemes[$id];
    }

    private function getThemeHierarchy(ThemeInterface $theme): array
    {
        return map(function (ThemeInterface $theme) {
            return $theme->getCode();
        }, $theme->getInheritedThemes());
    }
}
