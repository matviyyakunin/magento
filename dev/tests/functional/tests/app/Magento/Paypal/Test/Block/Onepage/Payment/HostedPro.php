<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Paypal\Test\Block\Onepage\Payment;

use Magento\Mtf\Client\ElementInterface;
use Magento\Paypal\Test\Block\Form\HostedPro\Cc;

/**
 * Hosted Pro credit card block.
 */
class HostedPro extends PaypalIframe
{
    /**
     * Block for filling credit card data for Hosted Pro payment method.
     *
     * @var string
     */
    protected $formBlockCc = Cc::class;

    /**
     * {@inheritdoc}
     */
    protected function waitSubmitForm(ElementInterface $iframeRootElement)
    {
        // This method is empty because Selenium is blocking current click operation.
    }
}
