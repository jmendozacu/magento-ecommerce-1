<?php


namespace SimplifiedMagento\VipDatabaseSchema\Api\Data;


interface VipMemberInterface
{
    const NAME = 'name';

    const ID = "entity_id";

    const STATUS = "status";

    const ADDRESS = "address";

    const PHONE_NUMBER = "phone_number";

    const CREATED_AT = "created_at";

    const UPDATED_AT = "updated_at";


    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return boolean
     */
    public function getStatus();

    /**
     * @return string
     */
    public function getAddress();

    /**
     * @return string
     */
    public function getPhoneNumber();

    /**
     * @return string
     */
    public function getCreatedAt();

    /**
     * @return string
     */
    public function getUpdatedAt();

    /**
     * @param $id
     * @return \SimplifiedMagento\VipDatabaseSchema\Api\Data\VipMemberInterface
     */
    public function setId($id);

    /**
     * @param $name
     * @return \SimplifiedMagento\VipDatabaseSchema\Api\Data\VipMemberInterface
     */
    public function setName($name);

    /**
     * @param $status
     * @return \SimplifiedMagento\VipDatabaseSchema\Api\Data\VipMemberInterface
     */
    public function setStatus($status);

    /**
     * @param $address
     * @return \SimplifiedMagento\VipDatabaseSchema\Api\Data\VipMemberInterface
     */
    public function setAddress($address);

    /**
     * @param $phoneNumber
     * @return \SimplifiedMagento\VipDatabaseSchema\Api\Data\VipMemberInterface
     */
    public function setPhoneNumber($phoneNumber);

}