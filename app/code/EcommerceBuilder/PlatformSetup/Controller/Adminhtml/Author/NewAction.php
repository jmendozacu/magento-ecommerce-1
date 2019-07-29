<?php
/**
 * Created by PhpStorm.
 * User: prabhat
 * Date: 26/7/19
 * Time: 11:23 PM
 */

namespace EcommerceBuilder\PlatformSetup\Controller\Adminhtml\Author;

use Magento\Framework\Controller\ResultFactory;

class NewAction extends \Magento\Backend\App\Action
{
    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}