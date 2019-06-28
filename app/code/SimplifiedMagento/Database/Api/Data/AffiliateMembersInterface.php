<?php


namespace SimplifiedMagento\Database\Api\Data;


interface AffiliateMembersInterface
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
     * @return int
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
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMembersInterface
     */
    public function setId($id);

    /**
     * @param $name
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMembersInterface
     */
    public function setName($name);

    /**
     * @param $status
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMembersInterface
     */
    public function setStatus($status);

    /**
     * @param $address
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMembersInterface
     */
    public function setAddress($address);

    /**
     * @param $phoneNumber
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMembersInterface
     */
    public function setPhoneNumber($phoneNumber);


    /**
     * @return \SimplifiedMagento\Database\Api\Data\AffiliateMembersExtensionInterface
     */
    public function getExtensionAttributes();

    /**
     * @param AffiliateMembersExtensionInterface $affiliateMembersExtension
     * @return $this
     */
    public function setExtensionAttributes(\SimplifiedMagento\Database\Api\Data\AffiliateMembersExtensionInterface $affiliateMembersExtension);



}