<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Install\Test\Constraint;

use Magento\Backend\Test\Page\Adminhtml\Dashboard;
use Magento\Mtf\Constraint\AbstractConstraint;
use PHPUnit\Framework\Assert;

/**
 * Assert that selected currency symbol displays in admin.
 */
class AssertCurrencySelected extends AbstractConstraint
{
    /**
     * Assert that selected currency symbol displays on dashboard.
     *
     * @param string $currencySymbol
     * @param Dashboard $dashboardPage
     * @return void
     */
    public function processAssert($currencySymbol, Dashboard $dashboardPage)
    {
        Assert::assertTrue(
            strpos($dashboardPage->getMainBlock()->getRevenuePrice(), $currencySymbol) !== false,
            'Selected currency symbol not displays on dashboard.'
        );
    }

    /**
     * Returns a string representation of the object.
     *
     * @return string
     */
    public function toString()
    {
        return 'Selected currency displays in admin.';
    }
}
