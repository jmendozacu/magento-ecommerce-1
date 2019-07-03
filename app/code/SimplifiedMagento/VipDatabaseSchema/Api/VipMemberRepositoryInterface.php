<?php


namespace SimplifiedMagento\VipDatabaseSchema\Api;


use Magento\Framework\Api\SearchCriteria;

interface VipMemberRepositoryInterface
{
    /**
     * @return \SimplifiedMagento\VipDatabaseSchema\Api\Data\VipMemberInterface[]
     */
    public function getList();

    /**
     * @param int $id
     * @return \SimplifiedMagento\VipDatabaseSchema\Api\Data\VipMemberInterface
     */
    public function getVipMemberById($id);

    /**
     * @param Data\VipMemberInterface $members
     * @return \SimplifiedMagento\VipDatabaseSchema\Api\Data\VipMemberInterface
     */
    public function saveAffiliateMember(\SimplifiedMagento\VipDatabaseSchema\Api\Data\VipMemberInterface $member);

    /**
     * @param int $id
     * @return void
     */
    public function deleteById($id);

    /**
     * @param SearchCriteria $searchCriteria
     * @return \SimplifiedMagento\VipDatabaseSchema\Api\Data\VipMemberSearchResultInterface
     */
    public function getSearchResultsList(SearchCriteria $searchCriteria);

}