<?php
/**
 * Hyvä Themes - https://hyva.io
 * Copyright © Hyvä Themes 2022-present. All rights reserved.
 * This product is licensed per Magento install
 * See https://hyva.io/license
 */

declare(strict_types=1);

namespace Hyva\BaseLayoutReset\Model\Layout;

class MutateXml
{
    public function removeXpath(\SimpleXMLElement $xmlElement, string $xpath, ?callable $predicate = null): void
    {
        $directives = $xmlElement->xpath($xpath);
        foreach ($directives as $directive) {
            $dom = dom_import_simplexml($directive);
            if (!$predicate || $predicate($dom)) {
                $dom->parentNode->removeChild($dom);
            }
        }
    }
}
