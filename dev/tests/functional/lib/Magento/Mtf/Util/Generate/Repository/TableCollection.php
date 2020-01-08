<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Mtf\Util\Generate\Repository;

use Magento\Framework\Data\Collection\Db\FetchStrategyInterface;
use Magento\Framework\Data\Collection\EntityFactory;
use Magento\Framework\DataObject;
use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\Event\ManagerInterface;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Psr\Log\LoggerInterface;

/**
 * Class CollectionProvider
 *
 */
class TableCollection extends AbstractCollection
{
    /**
     * @var array
     */
    protected $fixture;

    /**
     * @constructor
     * @param EntityFactory $entityFactory
     * @param LoggerInterface $logger
     * @param FetchStrategyInterface $fetchStrategy
     * @param ManagerInterface $eventManager
     * @param null $connection
     * @param AbstractDb $resource
     * @param array $fixture
     */
    public function __construct(
        EntityFactory $entityFactory,
        LoggerInterface $logger,
        FetchStrategyInterface $fetchStrategy,
        ManagerInterface $eventManager,
        AdapterInterface $connection = null,
        AbstractDb $resource = null,
        array $fixture = []
    ) {
        $this->setModel(DataObject::class);
        $this->setResourceModel(RepositoryResource::class);

        $resource = $this->getResource();
        $resource->setFixture($fixture);

        parent::__construct($entityFactory, $logger, $fetchStrategy, $eventManager, $connection, $resource);
    }

    /**
     * Get resource instance
     *
     * @return RepositoryResource
     */
    public function getResource()
    {
        return parent::getResource();
    }
}
