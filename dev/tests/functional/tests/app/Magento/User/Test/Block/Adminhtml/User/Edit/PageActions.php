<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\User\Test\Block\Adminhtml\User\Edit;

use Magento\Backend\Test\Block\FormPageActions;
use Magento\Ui\Test\Block\Adminhtml\Modal;

/**
 * Class PageActions
 * User page actions on user edit page.
 */
class PageActions extends FormPageActions
{
    /**
     * 'Force Sign-In' button selector.
     *
     * @var string
     */
    protected $forceSignIn = '#invalidate';

    /**
     * Selector for confirm.
     *
     * @var string
     */
    protected $confirmModal = '.confirm._show[data-role=modal]';

    /**
     * Click on 'Force Sign-In' button.
     *
     * @return void
     */
    public function forceSignIn()
    {
        $this->_rootElement->find($this->forceSignIn)->click();
        $element = $this->browser->find($this->confirmModal);
        /** @var Modal $modal */
        $modal = $this->blockFactory->create(Modal::class, ['element' => $element]);
        $modal->acceptAlert();
    }
}
