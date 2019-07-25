<?php
/**
 * Created by PhpStorm.
 * User: prabhat
 * Date: 25/7/19
 * Time: 4:08 PM
 */

namespace EcommerceBuilder\PlatformSetup\Model\ResourceModel\Author;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use EcommerceBuilder\PlatformSetup\Model\Author;
use EcommerceBuilder\PlatformSetup\Model\ResourceModel\Author as AuthorResource;

/**
 * Author Collection
 *
 * Class Collection
 * @package EcommerceBuilder\PlatformSetup\Model\ResourceModel\Author
 */
class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';

    /**
     * Collection initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(Author::class, AuthorResource::class);
    }
}