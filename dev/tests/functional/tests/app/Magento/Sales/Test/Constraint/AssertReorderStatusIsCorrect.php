<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Sales\Test\Constraint;

use Magento\Sales\Test\Block\Adminhtml\Order\View\Tab\Info;
use Magento\Sales\Test\Fixture\OrderInjectable;
use Magento\Sales\Test\Page\Adminhtml\OrderIndex;
use Magento\Sales\Test\Page\Adminhtml\SalesOrderView;
use Magento\Mtf\Constraint\AbstractConstraint;
use PHPUnit\Framework\Assert;

/**
 * Assert that status is correct on order page in admin panel.
 */
class AssertReorderStatusIsCorrect extends AbstractConstraint
{
    /**
     * Assert that status is correct on order page in admin panel (same with value of orderStatus variable).
     *
     * @param string $previousOrderStatus
     * @param OrderInjectable $order
     * @param OrderIndex $salesOrder
     * @param SalesOrderView $salesOrderView
     * @return void
     */
    public function processAssert(
        $previousOrderStatus,
        OrderInjectable $order,
        OrderIndex $salesOrder,
        SalesOrderView $salesOrderView
    ) {
        $salesOrder->open();
        $salesOrder->getSalesOrderGrid()->searchAndOpen(['id' => $order->getId()]);

        /** @var Info $infoTab */
        $infoTab = $salesOrderView->getOrderForm()->openTab('info')->getTab('info');
        Assert::assertEquals(
            $previousOrderStatus,
            $infoTab->getOrderStatus(),
            'Order status is incorrect on order page in backend.'
        );
    }

    /**
     * Returns a string representation of the object.
     *
     * @return string
     */
    public function toString()
    {
        return 'Order status is correct.';
    }
}
