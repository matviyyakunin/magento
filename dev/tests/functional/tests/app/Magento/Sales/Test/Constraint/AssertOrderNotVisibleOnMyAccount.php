<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Sales\Test\Constraint;

use Magento\Customer\Test\Fixture\Customer;
use Magento\Customer\Test\Page\CustomerAccountIndex;
use Magento\Customer\Test\TestStep\LoginCustomerOnFrontendStep;
use Magento\Sales\Test\Fixture\OrderInjectable;
use Magento\Sales\Test\Page\OrderHistory;
use Magento\Mtf\Constraint\AbstractConstraint;
use PHPUnit\Framework\Assert;

/**
 * Assert order is not visible in customer account on frontend.
 */
class AssertOrderNotVisibleOnMyAccount extends AbstractConstraint
{
    /**
     * Assert order is not visible in customer account on frontend
     *
     * @param OrderInjectable $order
     * @param Customer $customer
     * @param CustomerAccountIndex $customerAccountIndex
     * @param OrderHistory $orderHistory
     * @param string $status
     * @return void
     */
    public function processAssert(
        OrderInjectable $order,
        Customer $customer,
        CustomerAccountIndex $customerAccountIndex,
        OrderHistory $orderHistory,
        $status
    ) {
        $filter = [
            'id' => $order->getId(),
            'status' => $status,
        ];
        $this->objectManager->create(
            LoginCustomerOnFrontendStep::class,
            ['customer' => $customer]
        )->run();
        $customerAccountIndex->getAccountMenuBlock()->openMenuItem('My Orders');
        Assert::assertFalse(
            $orderHistory->getOrderHistoryBlock()->isVisible()
            && $orderHistory->getOrderHistoryBlock()->isOrderVisible($filter),
            'Order with following data \'' . implode(', ', $filter) . '\' is present in Orders block on frontend.'
        );
    }

    /**
     * Returns a string representation of the object
     *
     * @return string
     */
    public function toString()
    {
        return 'Sales order absent in orders on frontend.';
    }
}
