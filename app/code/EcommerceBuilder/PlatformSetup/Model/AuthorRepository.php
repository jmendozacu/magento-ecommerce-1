<?php
/**
 * Created by PhpStorm.
 * User: prabhat
 * Date: 26/7/19
 * Time: 12:39 PM
 */

namespace EcommerceBuilder\PlatformSetup\Model;

use EcommerceBuilder\PlatformSetup\Api\AuthorRepositoryInterface;
use EcommerceBuilder\PlatformSetup\Model\ResourceModel\Author\CollectionFactory;

class AuthorRepository implements AuthorRepositoryInterface
{
    private $collectionFactory;

    public function __construct(CollectionFactory $collectionFactory)
    {
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * @return \EcommerceBuilder\PlatformSetup\Api\Data\AuthorInterface[]|\Magento\Framework\DataObject[]
     */
    public function getList()
    {
        return $this->collectionFactory->create()->getItems();
    }
}