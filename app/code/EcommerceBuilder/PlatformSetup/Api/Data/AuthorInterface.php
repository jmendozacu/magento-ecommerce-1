<?php
/**
 * Created by PhpStorm.
 * User: prabhat
 * Date: 26/7/19
 * Time: 12:22 PM
 */

namespace EcommerceBuilder\PlatformSetup\Api\Data;


interface AuthorInterface
{
    /**
     * @return string
     */
    public function getAuthorName();

    /**
     * @return string
     */
    public function getEmail();

    /**
     * @return string
     */
    public function getAffliation();

    /**
     * @return int
     */
    public function getAge();
}