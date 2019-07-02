<?php


namespace SimplifiedMagento\VipDatabaseSchema\Model;

use SimplifiedMagento\VipDatabaseSchema\Api\VipMemberRepositoryInterface;
use SimplifiedMagento\VipDatabaseSchema\Model\ResourceModel\VipMember\CollectionFactory;

class VipMemberRepository implements VipMemberRepositoryInterface
{
    private $collectionFactory;

    public function __construct(CollectionFactory $collectionFactory)
    {
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * @return \SimplifiedMagento\VipDatabaseSchema\Api\Data\VipMemberInterface[]
     */
    public function getList()
    {
        return $this->collectionFactory->create()->getItems();
    }
}