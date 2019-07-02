<?php


namespace SimplifiedMagento\VipDatabaseSchema\Model;

use Magento\Framework\Model\AbstractModel;
use SimplifiedMagento\Database\Api\Data\AffiliateMembersInterface;
use SimplifiedMagento\VipDatabaseSchema\Model\ResourceModel\VipMember as VipMemberResource;
use SimplifiedMagento\VipDatabaseSchema\Api\Data\VipMemberInterface;

class VipMember extends AbstractModel implements VipMemberInterface
{
    protected function _construct()
    {
        $this->_init(VipMemberResource::class);
        parent::_construct(); // TODO: Change the autogenerated stub
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->getData(VipMemberInterface::NAME);

    }

    /**
     * @return boolean
     */
    public function getStatus(){
        return $this->getData(VipMemberInterface::STATUS);
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->getData(VipMemberInterface::ADDRESS);
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->getData(VipMemberInterface::PHONE_NUMBER);
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->getData(VipMemberInterface::CREATED_AT);
    }

    /**
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->getData(VipMemberInterface::UPDATED_AT);
    }

    /**
     * @param $name
     * @return \SimplifiedMagento\VipDatabaseSchema\Api\Data\VipMemberInterface
     */
    public function setName($name)
    {
        $this->setData(VipMemberInterface::NAME, $name);
    }

    /**
     * @param $status
     * @return \SimplifiedMagento\VipDatabaseSchema\Api\Data\VipMemberInterface
     */
    public function setStatus($status)
    {
        $this->setData(VipMemberInterface::STATUS, $status);    }

    /**
     * @param $address
     * @return \SimplifiedMagento\VipDatabaseSchema\Api\Data\VipMemberInterface
     */
    public function setAddress($address)
    {
        $this->setData(VipMemberInterface::ADDRESS, $address);    }

    /**
     * @param $phoneNumber
     * @return \SimplifiedMagento\VipDatabaseSchema\Api\Data\VipMemberInterface
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->setData(VipMemberInterface::PHONE_NUMBER, $phoneNumber);
    }
}