<?php


namespace SimplifiedMagento\VipDatabaseSchema\Model;

use SimplifiedMagento\VipDatabaseSchema\Api\Data;
use SimplifiedMagento\VipDatabaseSchema\Api\VipMemberRepositoryInterface;
use SimplifiedMagento\VipDatabaseSchema\Model\ResourceModel\VipMember\CollectionFactory;
use SimplifiedMagento\VipDatabaseSchema\Model\VipMemberFactory;
use SimplifiedMagento\VipDatabaseSchema\Model\ResourceModel\VipMember;

class VipMemberRepository implements VipMemberRepositoryInterface
{
    private $collectionFactory;

    private $vipMemberFactory;

    private $vipMember;

    public function __construct(CollectionFactory $collectionFactory, VipMemberFactory $vipMemberFactory, VipMember $vipMember)
    {
        $this->collectionFactory = $collectionFactory;
        $this->vipMemberFactory = $vipMemberFactory;
        $this->vipMember = $vipMember;
    }

    /**
     * @return \SimplifiedMagento\VipDatabaseSchema\Api\Data\VipMemberInterface[]
     */
    public function getList()
    {
        return $this->collectionFactory->create()->getItems();
    }

    /**
     * @param int $id
     * @return \SimplifiedMagento\VipDatabaseSchema\Api\Data\VipMemberInterface
     */
    public function getVipMemberById($id)
    {
        $vipMember =  $this->vipMemberFactory->create();
        return $vipMember->load($id);
    }

    /**
     * @param Data\VipMemberInterface $member
     * @return \SimplifiedMagento\VipDatabaseSchema\Api\Data\VipMemberInterface
     */
    public function saveAffiliateMember(Data\VipMemberInterface $member)
    {
        if($member->getId() == null){
            $this->vipMember->save($member);
            return $member;
        }else{
            $newMember = $this->vipMemberFactory->create()->load($member->getId());
            foreach($member->getData() as $key => $value){
                $newMember->setData($key, $value);
            }

            $this->vipMember->save($newMember);
            return $newMember;
        }

    }

    /**
     * @param int $id
     * @return void
     */
    public function deleteById($id)
    {
        $member= $this->vipMemberFactory->create()->load($id);
        $member->delete();
    }
}