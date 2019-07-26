<?php
/**
 * Created by PhpStorm.
 * User: prabhat
 * Date: 26/7/19
 * Time: 4:22 PM
 */

namespace EcommerceBuilder\PlatformSetup\Model\ResourceModel\Author\Grid;


use Magento\Framework\Data\Collection\Db\FetchStrategyInterface as FetchStrategy;
use Magento\Framework\Data\Collection\EntityFactoryInterface as EntityFactory;
use Magento\Framework\Event\ManagerInterface as EventManager;
use Psr\Log\LoggerInterface as Logger;

class Collection extends \Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult
{
    public function __construct(EntityFactory $entityFactory,
                                Logger $logger,
                                FetchStrategy $fetchStrategy,
                                EventManager $eventManager,
                                string $mainTable = "author_data",
                                string $resourceModel = "EcommerceBuilder\PlatformSetup\Model\ResourceModel\Author",
                                string $identifierName = null,
                                string $connectionName = null)
    {
        parent::__construct($entityFactory, $logger, $fetchStrategy, $eventManager, $mainTable, $resourceModel, $identifierName, $connectionName);
    }

}