<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Catalog\Test\Constraint;

use Magento\Catalog\Test\Page\Adminhtml\CatalogProductEdit;
use Magento\Catalog\Test\Page\Adminhtml\CatalogProductIndex;
use Magento\Mtf\Constraint\AbstractConstraint;
use Magento\Mtf\Fixture\FixtureInterface;
use PHPUnit\Framework\Assert;

/**
 * Assert that can save already exist product.
 */
class AssertCanSaveProduct extends AbstractConstraint
{
    /**
     * Assert that can save already existing product.
     *
     * @param FixtureInterface $product
     * @param CatalogProductEdit $catalogProductEdit
     * @param CatalogProductIndex $catalogProductIndex
     * @return void
     */
    public function processAssert(
        FixtureInterface $product,
        CatalogProductEdit $catalogProductEdit,
        CatalogProductIndex $catalogProductIndex
    ) {
        $filter = ['sku' => $product->getSku()];
        $catalogProductIndex->open()->getProductGrid()->searchAndOpen($filter);
        $catalogProductEdit->getFormPageActions()->save();

        Assert::assertNotEmpty(
            $catalogProductEdit->getMessagesBlock()->getSuccessMessage(),
            'Can\'t save existing product.'
        );
    }

    /**
     * Returns a string representation of the object.
     *
     * @return string
     */
    public function toString()
    {
        return 'Product was saved without errors.';
    }
}
