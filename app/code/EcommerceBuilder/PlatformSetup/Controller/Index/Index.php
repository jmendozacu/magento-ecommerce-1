<?php
/**
 * Created by PhpStorm.
 * User: prabhat
 * Date: 25/7/19
 * Time: 4:39 PM
 */

namespace EcommerceBuilder\PlatformSetup\Controller\Index;

use Magento\Framework\Controller\ResultFactory;

/**
 * Index Action
 *
 * Class Index
 * @package EcommerceBuilder\PlatformSetup\Controller\Index
 */
class Index extends \Magento\Framework\App\Action\Action
{

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Raw|\Magento\Framework\Controller\ResultInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}