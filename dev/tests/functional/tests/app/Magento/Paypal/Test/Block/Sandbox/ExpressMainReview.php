<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Paypal\Test\Block\Sandbox;

use Magento\Mtf\Block\Block;

/**
 * New or old review order block on PayPal side.
 */
class ExpressMainReview extends Block
{
    /**
     * Express Review Block selector.
     *
     * @var string
     */
    protected $expressReview = '#memberReview';

    /**
     * Determines whether new review block or old is shown.
     *
     * @return ExpressReview|ExpressOldReview
     */
    public function getReviewBlock()
    {
        if ($this->_rootElement->find($this->expressReview)->isVisible()) {
            return $this->blockFactory->create(
                ExpressReview::class,
                ['element' => $this->_rootElement]
            );
        }
        return $this->blockFactory->create(
            ExpressOldReview::class,
            ['element' => $this->_rootElement]
        );
    }
}
