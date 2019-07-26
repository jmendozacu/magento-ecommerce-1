<?php
/**
 * Created by PhpStorm.
 * User: prabhat
 * Date: 26/7/19
 * Time: 12:33 PM
 */

namespace EcommerceBuilder\PlatformSetup\Api;


interface AuthorRepositoryInterface
{
    /**
     * @return \EcommerceBuilder\PlatformSetup\Api\Data\AuthorInterface[]
     */
    public function getList();
}