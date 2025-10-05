<?php
/**
 * Hyvä Themes - https://hyva.io
 * Copyright © Hyvä Themes 2022-present. All rights reserved.
 * This product is licensed per Magento install
 * See https://hyva.io/license
 */

declare(strict_types=1);

namespace Hyva\BaseLayoutReset\Model\Layout\SpecialCaseLayoutFileReset;

interface SpecialCaseBaseLayoutResetInterface
{
    public function matches(string $module, string $filename): bool;

    public function resetLayout(\SimpleXMLElement $layoutXml): void;
}
