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

class NegotiableQuoteTemplateViewBaseLayoutReset implements SpecialCaseBaseLayoutResetInterface
{
    /**
     * @var GenericBaseLayoutFileReset
     */
    private $genericBaseLayoutFileReset;

    /**
     * @var MutateXml
     */
    private $mutateXml;

    public function __construct(
        GenericBaseLayoutFileReset $genericBaseLayoutFileReset,
        MutateXml $mutateXml
    ) {
        $this->genericBaseLayoutFileReset = $genericBaseLayoutFileReset;
        $this->mutateXml = $mutateXml;
    }

    public function matches(string $module, string $filename): bool
    {
        return $module === 'Magento_NegotiableQuote' && $filename === 'quote_templates_template_view.xml';
    }

    public function resetLayout(\SimpleXMLElement $layoutXml): void
    {
        $this->genericBaseLayoutFileReset->resetLayout($layoutXml, /* Skip xpaths */ ['//referenceBlock[@template]']);

        // Keep checkout.success block template removal
        $this->mutateXml->removeXpath($layoutXml, '//referenceBlock[@template]', function (\DOMElement $dom): bool {
            return $dom->getAttribute('name') !== 'quote.view';
        });
    }
}
