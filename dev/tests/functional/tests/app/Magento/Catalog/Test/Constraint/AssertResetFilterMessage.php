<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Catalog\Test\Constraint;

use Magento\Catalog\Test\Page\Adminhtml\CatalogProductIndex;
use Magento\Mtf\Constraint\AbstractConstraint;
use PHPUnit\Framework\Assert;

/**
 * Assert that filters have been reset successfully.
 */
class AssertResetFilterMessage extends AbstractConstraint
{
    /**
     * Assert message that filters have been reset.
     *
     * @param CatalogProductIndex $catalogProductIndex
     * @return void
     */
    public function processAssert(
        CatalogProductIndex $catalogProductIndex
    ) {
        Assert::assertContains(
            'restored the filter to its original state',
            $catalogProductIndex->getMessagesBlock()->getErrorMessage(),
            "Can't find proper message"
        );
    }

    /**
     * Returns a string representation of the object.
     *
     * @return string
     */
    public function toString()
    {
        return 'Filters have been reset successfully.';
    }
}
