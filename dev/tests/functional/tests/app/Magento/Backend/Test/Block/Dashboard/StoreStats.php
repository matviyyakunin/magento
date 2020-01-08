<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Backend\Test\Block\Dashboard;

use Magento\Backend\Test\Block\Widget\FormTabs;

class StoreStats extends FormTabs
{
    /**
     * Refresh data button
     *
     * @var string
     */
    protected $refreshData = 'button';

    /**
     * Click Refresh Data button
     *
     * return void
     */
    public function refreshData()
    {
        $this->_rootElement->find($this->refreshData)->click();
    }
}
