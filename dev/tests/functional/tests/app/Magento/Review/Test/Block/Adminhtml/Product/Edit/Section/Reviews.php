<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Review\Test\Block\Adminhtml\Product\Edit\Section;

use Magento\Review\Test\Block\Adminhtml\Edit\Product\Grid;
use Magento\Ui\Test\Block\Adminhtml\Section;

/**
 * Reviews section on product edit page.
 */
class Reviews extends Section
{
    /**
     * Product reviews block selector.
     *
     * @var string
     */
    protected $reviews = '[data-index="review"]';

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
