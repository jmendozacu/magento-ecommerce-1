<?php
/**
 * Created by PhpStorm.
 * User: prabhat
 * Date: 25/7/19
 * Time: 4:43 PM
 */

namespace EcommerceBuilder\PlatformSetup\Controller\Adminhtml\Index;

use Magento\Framework\Controller\ResultFactory;

class Index extends \Magento\Backend\App\Action
{

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}