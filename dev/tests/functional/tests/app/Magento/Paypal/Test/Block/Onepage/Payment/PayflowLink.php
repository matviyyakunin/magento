<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Paypal\Test\Block\Onepage\Payment;

use Magento\Paypal\Test\Block\Form\PayflowLink\Cc;

/**
 * Payflow Link credit card block.
 */
class PayflowLink extends PaypalIframe
{
    /**
     * Block for filling credit card data for Payflow Link payment method.
     *
     * @var string
     */
    protected $formBlockCc = Cc::class;
}
