<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Sales\Test\Constraint;

use Magento\Customer\Test\Block\Address\Renderer;
use Magento\Customer\Test\Fixture\Address;
use Magento\Sales\Test\Page\SalesGuestPrint;
use Magento\Mtf\Constraint\AbstractConstraint;
use PHPUnit\Framework\Assert;

/**
 * Assert that BillingAddress printed correctly on sales guest print page.
 */
class AssertSalesPrintOrderBillingAddress extends AbstractConstraint
{
    /**
     * Assert that BillingAddress printed correctly on sales guest print page.
     *
     * @param SalesGuestPrint $salesGuestPrint
     * @param Address $billingAddress
     * @return void
     */
    public function processAssert(SalesGuestPrint $salesGuestPrint, Address $billingAddress)
    {
        $addressRenderer = $this->objectManager->create(
            Renderer::class,
            ['address' => $billingAddress, 'type' => 'html']
        );
        $expectedBillingAddress = $addressRenderer->render();
        Assert::assertEquals(
            $expectedBillingAddress,
            $salesGuestPrint->getInfoBlock()->getBillingAddress(),
            "Billing address was printed incorrectly."
        );
    }

    /**
     * Returns a string representation of successful assertion.
     *
     * @return string
     */
    public function toString()
    {
        return "Billing address printed correctly.";
    }
}
