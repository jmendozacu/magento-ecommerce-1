<?php


namespace SimplifiedMagento\VipDatabaseSchema\Model\ResourceModel\VipMember;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use SimplifiedMagento\VipDatabaseSchema\Model\ResourceModel\VipMember as VipMemberResource;
use SimplifiedMagento\VipDatabaseSchema\Model\VipMember;

class Collection extends AbstractCollection
{
    public function _construct()
    {
        $this->_init(VipMember::class,VipMemberResource::class);
        parent::_construct(); // TODO: Change the autogenerated stub
    }

}