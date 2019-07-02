<?php


namespace SimplifiedMagento\VipDatabaseSchema\Model\ResourceModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class VipMember extends AbstractDb
{

    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('vip_member','entity_id');
    }
}