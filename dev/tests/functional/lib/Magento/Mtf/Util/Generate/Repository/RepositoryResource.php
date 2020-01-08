<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Mtf\Util\Generate\Repository;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class Resource
 *
 */
class RepositoryResource extends AbstractDb
{
    /**
     * Set fixture entity_type
     *
     * @param array $fixture
     */
    public function setFixture(array $fixture)
    {
        $this->_mainTable = $fixture['entity_type'];
    }

    /**
     * Load an object
     *
     * @param AbstractModel $object
     * @param mixed $value
     * @param null $field
     * @return AbstractDb|void
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function load(AbstractModel $object, $value, $field = null)
    {
        // forbid using resource model
    }

    /**
     * Resource initialization
     */
    protected function _construct()
    {
        //
    }
}
