<?php


namespace SimplifiedMagento\Database\Api;

use Magento\Framework\Api\SearchCriteria;

interface AffiliateMembersRepositoryInterface
{
    /**
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMembersInterface[]
     */
    public function getList();

    /**
     * @param int $id
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMembersInterface
     */
    public function getAffiliateMemberById($id);


    /**
     * @param int $id
     * @return void
     */
    public function deleteById($id);


    /**
     * @param Data\AffiliateMembersInterface $members
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMembersInterface
     */
    public function saveAffiliateMember(\SimplifiedMagento\Database\Api\Data\AffiliateMembersInterface $members);

    /**
     * @param SearchCriteria $searchCriteria
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMembersSearchResultInterface
     */
    public function getSearchResultsList(SearchCriteria $searchCriteria);



}