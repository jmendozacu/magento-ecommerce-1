<?php


namespace SimplifiedMagento\VipDatabaseSchema\Api;


interface VipMemberRepositoryInterface
{
    /**
     * @return \SimplifiedMagento\VipDatabaseSchema\Api\Data\VipMemberInterface[]
     */
    public function getList();

}