<?php


namespace SimplifiedMagento\RequestModule\Controller\Page;


use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Controller\Result\Raw;
use Magento\Framework\Controller\Result\ForwardFactory;
use Magento\Framework\Controller\Result\RedirectFactory;


class ResponseType extends \Magento\Framework\App\Action\Action
{
    protected $pageFactory;

    protected $jsonFactory;

    protected $raw;

    protected $forwardFactory;

    protected $redirectFactory;

    public function __construct(Context $context, PageFactory $pageFactory, JsonFactory $jsonFactory, Raw $raw, ForwardFactory $forwardFactory, RedirectFactory $redirectFactory )
    {
        $this->pageFactory = $pageFactory;
        $this->jsonFactory = $jsonFactory;
        $this->raw = $raw;
        $this->forwardFactory = $forwardFactory;
        $this->redirectFactory = $redirectFactory;
        parent::__construct($context);
    }

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
        //return $this->pageFactory->create(); //return default page by Magento
        //return $this->jsonFactory->create()->setData(['key' => 'Value']);  //return json response
        //return $this->raw->setContents("from Raw Data"); // Return  raw data
        //return $this->forwardFactory->create()->setModule('noroutefound')->setController('page')->forward('customnoroute'); //internal redirect
        return $this->redirectFactory->create()->setPath('noroutefound/page/customnoroute'); //redirect to another url
    }
}