<?php


namespace SimplifiedMagento\Database\Model;

use Magento\Framework\Api\SearchCriteria;
use SimplifiedMagento\Database\Api\AffiliateMembersRepositoryInterface;
use SimplifiedMagento\Database\Api\Data;
use SimplifiedMagento\Database\Model\ResourceModel\AffiliateMembers\CollectionFactory;
use SimplifiedMagento\Database\Model\ResourceModel\AffiliateMembers;
use SimplifiedMagento\Database\Model\AffiliateMembersFactory;
use SimplifiedMagento\Database\Api\Data\AffiliateMembersSearchResultInterfaceFactory;
use Magento\framework\Api\SearchCriteria\CollectionProcessor;


class AffiliateMembersRepository implements AffiliateMembersRepositoryInterface
{
    private $collectionFactory;

    private $affiliateMembersFactory;

    private $affiliateMembers;

    private $resultInterfaceFactory;

    private $collectionProcessor;

    /**
     * AffiliateMembersRepository constructor.
     * @param CollectionFactory $collectionFactory
     */public function __construct(CollectionFactory $collectionFactory, AffiliateMembersFactory $affiliateMembersFactory, AffiliateMembers $affiliateMembers,
                                   AffiliateMembersSearchResultInterfaceFactory $resultInterfaceFactory,
                                   CollectionProcessor $collectionProcessor )
    {
        $this->collectionFactory = $collectionFactory;
        $this->affiliateMembersFactory= $affiliateMembersFactory;
        $this->affiliateMembers = $affiliateMembers;
        $this->resultInterfaceFactory = $resultInterfaceFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMembersInterface[]
     */
    public function getList()
    {

        return $this->collectionFactory->create()->getItems();
    }


    /**
     * @param int $id
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMembersInterface|AffiliateMembers
     */
    public function getAffiliateMemberById($id)
    {
        $member= $this->affiliateMembersFactory->create();
        return $member->load($id);
    }

    /**
     * @param Data\AffiliateMembersInterface $members
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMembersInterface
     */
    public function saveAffiliateMember(\SimplifiedMagento\Database\Api\Data\AffiliateMembersInterface $members)
    {
        if($members->getId() == null){
            $this->affiliateMembers->save($members);
            return $members;
        }else{
            $newMember = $this->affiliateMembersFactory->create()->load($members->getId());
            foreach($members->getData() as $key => $value){
                $newMember->setData($key, $value);
            }

            $this->affiliateMembers->save($newMember);
            return $newMember;
        }

    }


    /**
     * @param int $id
     * @return void
     */
    public function deleteById($id)
    {
        $member= $this->affiliateMembersFactory->create()->load($id);
        $member->delete();
    }

    /**
     * @param SearchCriteria $searchCriteria
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMembersSearchResultInterface
     */
    public function getSearchResultsList(SearchCriteria $searchCriteria)
    {
        $collection = $this->affiliateMembersFactory->create()->getCollection();
        $this->collectionProcessor->process($searchCriteria,$collection);
        $searchResults = $this->resultInterfaceFactory->create();
        $searchResults->setItems($collection->getData());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }
}