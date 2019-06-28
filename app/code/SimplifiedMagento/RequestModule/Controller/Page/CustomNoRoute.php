<?php


namespace SimplifiedMagento\RequestModule\Controller\Page;


use Magento\Framework\App\ResponseInterface;

class CustomNoRoute extends \Magento\Framework\App\Action\Action
{

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        echo "Custom 404 Page";
    }
}