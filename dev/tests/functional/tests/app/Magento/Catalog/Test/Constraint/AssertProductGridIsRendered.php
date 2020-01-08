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
 * Assert that product grid is rendered correctly.
 */
class AssertProductGridIsRendered extends AbstractConstraint
{
    /**
     * Assert that product grid is rendered correctly.
     *
     * @param CatalogProductIndex $catalogProductIndex
     * @return void
     */
    public function processAssert(
        CatalogProductIndex $catalogProductIndex
    ) {
        $productId = $catalogProductIndex->open()->getProductGrid()->getFirstItemId();
        Assert::assertNotNull(
            $productId,
            'Product grid is not rendered correctly.'
        );
    }

    /**
     * Returns a string representation of the object.
     *
     * @return string
     */
    public function toString()
    {
        return 'Product grid is rendered correctly.';
    }
}
