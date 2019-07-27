<?php
/**
 * Created by PhpStorm.
 * User: prabhat
 * Date: 26/7/19
 * Time: 11:27 PM
 */

namespace EcommerceBuilder\PlatformSetup\Controller\Adminhtml\Author;

use EcommerceBuilder\PlatformSetup\Model\AuthorFactory;

class Save extends \Magento\Backend\App\Action
{
    private $authorFactory;

    public function __construct(\Magento\Backend\App\Action\Context $context,
                                AuthorFactory $authorFactory )
    {
        $this->authorFactory = $authorFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $this->authorFactory->create()
            ->setData($this->getRequest()->getPostValue()['general'])
            ->save();
        return $this->resultRedirectFactory->create()->setPath('author/index/index');

    }
}