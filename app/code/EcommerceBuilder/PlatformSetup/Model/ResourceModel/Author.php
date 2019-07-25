<?php
/**
 * Created by PhpStorm.
 * User: prabhat
 * Date: 25/7/19
 * Time: 3:53 PM
 */

namespace EcommerceBuilder\PlatformSetup\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Author entity resource model
 *
 * Class Author
 * @package EcommerceBuilder\PlatformSetup\Model\ResourceModel
 */
class Author extends AbstractDb
{

    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('author_data', 'id');
    }
}