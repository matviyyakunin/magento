<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Bundle\Test\TestStep;

use Magento\Mtf\TestStep\TestStepInterface;
use Magento\Sales\Test\TestStep\CreateInvoiceStep;

/**
 * Create invoice from order on backend.
 */
class CreatePartialInvoiceStep extends CreateInvoiceStep implements TestStepInterface
{

    /**
     * {@inheritdoc}
     */
    protected function getItems()
    {
        $items = parent::getItems();
        return $items[0]->getData()['options'];
    }
}
