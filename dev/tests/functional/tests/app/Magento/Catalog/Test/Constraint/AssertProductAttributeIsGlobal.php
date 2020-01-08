<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Catalog\Test\Constraint;

use Magento\Catalog\Test\Fixture\CatalogProductAttribute;
use Magento\Catalog\Test\Page\Adminhtml\CatalogProductAttributeIndex;
use Magento\Mtf\Constraint\AbstractConstraint;
use PHPUnit\Framework\Assert;

/**
 * Look on the scope of product attribute in the grid.
 */
class AssertProductAttributeIsGlobal extends AbstractConstraint
{
    /**
     * Look on the scope of product attribute in the grid.
     *
     * @param CatalogProductAttributeIndex $catalogProductAttributeIndex
     * @param CatalogProductAttribute $attribute
     * @return void
     */
    public function processAssert(
        CatalogProductAttributeIndex $catalogProductAttributeIndex,
        CatalogProductAttribute $attribute
    ) {
        $filter = ['frontend_label' => $attribute->getFrontendLabel(), 'is_global' => $attribute->getIsGlobal()];

        Assert::assertTrue(
            $catalogProductAttributeIndex->open()->getGrid()->isRowVisible($filter),
            'Attribute is not global.'
        );
    }

    /**
     * Return string representation of object.
     *
     * @return string
     */
    public function toString()
    {
        return 'Attribute is global.';
    }
}
