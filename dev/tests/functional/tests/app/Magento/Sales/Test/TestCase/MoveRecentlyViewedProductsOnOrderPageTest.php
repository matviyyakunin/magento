<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Sales\Test\TestCase;

use Magento\Catalog\Test\TestStep\CreateProductsStep;
use Magento\Catalog\Test\TestStep\OpenProductsOnFrontendStep;
use Magento\Customer\Test\TestStep\CreateOrderFromCustomerAccountStep;
use Magento\Customer\Test\TestStep\LoginCustomerOnFrontendStep;
use Magento\Customer\Test\TestStep\OpenCustomerOnBackendStep;
use Magento\Mtf\TestCase\Injectable;
use Magento\Customer\Test\Fixture\Customer;
use Magento\Sales\Test\TestStep\AddRecentlyViewedProductsToCartStep;
use Magento\Sales\Test\TestStep\ConfigureProductsStep;
use Magento\Sales\Test\TestStep\SelectStoreStep;

/**
 * Preconditions:
 * 1. Create customer.
 * 2. Create product.
 * 3. Open product on frontend.
 *
 * Steps:
 * 1. Login in to Backend.
 * 2. Open Customers > All Customers.
 * 3. Search and open customer from preconditions.
 * 4. Click Create Order.
 * 5. Check product in Recently Viewed Products section.
 * 6. Click Update Changes.
 * 7. Click Configure.
 * 8. Fill data from dataset.
 * 9. Click OK.
 * 10. Click Update Items and Qty's button.
 * 11. Perform all assertions.
 *
 * @group Order_Management
 * @ZephyrId MAGETWO-29723
 */
class MoveRecentlyViewedProductsOnOrderPageTest extends Injectable
{
    /* tags */
    const MVP = 'yes';
    /* end tags */

    /**
     * Create customer.
     *
     * @param Customer $customer
     * @return array
     */
    public function __prepare(Customer $customer)
    {
        $customer->persist();
        $this->objectManager
            ->create(LoginCustomerOnFrontendStep::class, ['customer' => $customer])
            ->run();

        return ['customer' => $customer];
    }

    /**
     * Runs Move Recently Viewed Products On Order Page.
     *
     * @param Customer $customer
     * @param array $products
     * @return array
     */
    public function test(Customer $customer, array $products)
    {
        // Preconditions
        $products = $this->objectManager
            ->create(CreateProductsStep::class, ['products' => $products])
            ->run()['products'];
        $this->objectManager
            ->create(OpenProductsOnFrontendStep::class, ['products' => $products])
            ->run();

        // Steps
        $this->objectManager
            ->create(OpenCustomerOnBackendStep::class, ['customer' => $customer])
            ->run();
        $this->objectManager->create(CreateOrderFromCustomerAccountStep::class)->run();
        $this->objectManager->create(SelectStoreStep::class)->run();
        $this->objectManager
            ->create(AddRecentlyViewedProductsToCartStep::class, ['products' => $products])
            ->run();
        $this->objectManager
            ->create(ConfigureProductsStep::class, ['products' => $products])
            ->run();

        return ['products' => $products];
    }
}
