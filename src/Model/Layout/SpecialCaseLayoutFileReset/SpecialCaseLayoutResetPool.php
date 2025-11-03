<?php
/**
 * Hyvä Themes - https://hyva.io
 * Copyright © Hyvä Themes 2022-present. All rights reserved.
 * This product is licensed per Magento install
 * See https://hyva.io/license
 */

declare(strict_types=1);

namespace Hyva\BaseLayoutReset\Model\Layout\SpecialCaseLayoutFileReset;

use IteratorAggregate;
use Traversable;

class SpecialCaseLayoutResetPool implements IteratorAggregate
{
    /**
     * @var SpecialCaseBaseLayoutResetInterface[]
     */
    private $specialCases;

    public function __construct(array $specialCases)
    {
        $this->specialCases = $specialCases;
    }

    public function getIterator(): Traversable
    {
        return new \ArrayIterator(array_filter($this->specialCases));
    }
}
