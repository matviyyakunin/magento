<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\User\Test\Block\Adminhtml\User\Tab;

use Magento\Mtf\Client\Element\SimpleElement;
use Magento\Backend\Test\Block\Widget\Tab;
use Magento\User\Test\Block\Adminhtml\User\Tab\Role\Grid;

/**
 * Class Role
 * User role tab on UserEdit page.
 */
class Role extends Tab
{
    /**
     * Fill user options
     *
     * @param array $fields
     * @param SimpleElement|null $element
     * @return void
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function setFieldsData(array $fields, SimpleElement $element = null)
    {
        $this->getRoleGrid()->searchAndSelect(['rolename' => $fields['role_id']['value']]);
    }

    /**
     * Returns role grid
     *
     * @return Grid
     */
    public function getRoleGrid()
    {
        return $this->blockFactory->create(
            Grid::class,
            ['element' => $this->_rootElement->find('#permissionsUserRolesGrid')]
        );
    }
}
