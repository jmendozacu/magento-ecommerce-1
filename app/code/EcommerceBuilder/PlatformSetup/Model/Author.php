<?php
/**
 * Created by PhpStorm.
 * User: prabhat
 * Date: 25/7/19
 * Time: 4:00 PM
 */

namespace EcommerceBuilder\PlatformSetup\Model;

use Magento\Framework\Model\AbstractModel;

/**
 * Author Model
 *
 * Class Author
 * @package EcommerceBuilder\PlatformSetup\Model
 */
class Author extends AbstractModel
{
    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\EcommerceBuilder\PlatformSetup\Model\ResourceModel\Author::class);
    }
}