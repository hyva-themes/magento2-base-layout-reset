<?php
/**
 * Hyvä Themes - https://hyva.io
 * Copyright © Hyvä Themes 2022-present. All rights reserved.
 * This product is licensed per Magento install
 * See https://hyva.io/license
 */

declare(strict_types=1);

namespace Hyva\BaseLayoutReset\Model\Layout\SpecialCaseLayoutFileReset;

use Hyva\BaseLayoutReset\Model\Layout\GenericBaseLayoutFileReset;
use Hyva\BaseLayoutReset\Model\Layout\MutateXml;

class DownloadableCustomerProductsBaseLayoutReset implements SpecialCaseBaseLayoutResetInterface
{
    private GenericBaseLayoutFileReset $genericBaseLayoutFileReset;

    private MutateXml $mutateXml;

    public function __construct(
        GenericBaseLayoutFileReset $genericBaseLayoutFileReset,
        MutateXml $mutateXml
    ) {
        $this->genericBaseLayoutFileReset = $genericBaseLayoutFileReset;
        $this->mutateXml = $mutateXml;
    }

    public function matches(string $module, string $filename): bool
    {
        return $module === 'Magento_Downloadable' && $filename === 'downloadable_customer_products.xml';
    }

    public function resetLayout(\SimpleXMLElement $layoutXml): void
    {
        $this->genericBaseLayoutFileReset->resetLayout($layoutXml, /* Skip xpaths */ ['//action']);

        // Keep page title which is set using <action> on the downloadable_customer_products route
        $this->mutateXml->removeXpath($layoutXml, '//action', function (\DOMElement $dom): bool {
            return $dom->getAttribute('method') !== 'setHeaderTitle';
        });
    }
}
