<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Weee\Test\Block\Cart;

use Magento\Mtf\Client\Locator;
use Magento\Weee\Test\Block\Cart\Totals\Fpt;

/**
 * Cart totals fpt block
 */
class Totals extends \Magento\Checkout\Test\Block\Cart\Totals
{
    /**
     * Fpt block selector
     *
     * @var string
     */
    protected $fptBlock = './/tr[normalize-space(th)="FPT"]';

    /**
     * Get block fpt totals
     *
     * @return Fpt
     */
    public function getFptBlock()
    {
        return $this->blockFactory->create(
            Fpt::class,
            ['element' => $this->_rootElement->find($this->fptBlock, Locator::SELECTOR_XPATH)]
        );
    }
}
