<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Review\Test\Block\Adminhtml\Customer\Edit\Tab;

use Magento\Backend\Test\Block\Widget\Tab;
use Magento\Review\Test\Block\Adminhtml\Grid;

/**
 * Reviews tab on customer edit page.
 */
class Reviews extends Tab
{
    /**
     * Product reviews block selector.
     *
     * @var string
     */
    protected $reviews = '#reviwGrid';

    /**
     * Returns product reviews grid.
     *
     * @return Grid
     */
    public function getReviewsGrid()
    {
        return $this->blockFactory->create(
            Grid::class,
            ['element' => $this->_rootElement->find($this->reviews)]
        );
    }
}
