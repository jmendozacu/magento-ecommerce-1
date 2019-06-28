<?php /**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace SimplifiedMagento\FirstModule\Controller\Page;

//use Magento\Framework\Event\ManagerInterface;

//use Magento\Catalog\Api\ProductRepositoryInterface;

class HelloWorld extends \Magento\Framework\App\Action\Action 
{
    /**
     * @var \Magento\Framework\Controller\Result\JsonFactory
     */
    protected $resultJsonFactory;

    protected $pencilInterface;

    protected $productRepositoryInterface;

    protected $pencilFactory;

    protected $productFactory;

    protected $_eventManager;

    protected $http;

    protected $heavyService;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
     * @param \SimplifiedMagento\FirstModule\Api\PencilInterface $pencilInterface
     * @param \Magento\Catalog\Api\ProductRepositoryInterface $productRepositoryInterface
     * @param \SimplifiedMagento\FirstModule\Model\PencilFactory $pencilFactory
     * @param \Magento\Catalog\Model\ProductFactory $productFactory
     * @param \Magento\Framework\Event\ManagerInterface $_eventManager
     */
    public function __construct(
       \Magento\Framework\App\Action\Context $context,
       \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
       \SimplifiedMagento\FirstModule\Api\PencilInterface $pencilInterface,
       \Magento\Catalog\Api\ProductRepositoryInterface $productRepositoryInterface,
        \SimplifiedMagento\FirstModule\Model\PencilFactory $pencilFactory,
        \Magento\Catalog\Model\ProductFactory $productFactory,
       \Magento\Framework\Event\ManagerInterface $_eventManager,
    \Magento\Framework\App\Request\Http $http,
    \SimplifiedMagento\FirstModule\Model\HeavyService $heavyService
        )
    {
        $this->pencilInterface = $pencilInterface;
        $this->resultJsonFactory = $resultJsonFactory;
        $this->productRepositoryInterface = $productRepositoryInterface;
        $this->pencilFactory = $pencilFactory;
        $this->productFactory = $productFactory;
        $this->_eventManager = $_eventManager;
        $this->http = $http;
        $this->heavyService = $heavyService;
       parent::__construct($context);
   }
    /**
     * View  page action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /*For demo related to dependency injection and related concepts*/
       //echo($this->pencilInterface->getPencilType());
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $pencil = $objectManager->create('SimplifiedMagento\FirstModule\Model\Pencil');
        var_dump($pencil);
        /*$pencil = $this->pencilFactory->create(array('name' => 'Alex','school'=>'new school'));
        var_dump($pencil);*/
        /*------------------------------------------------------------------------*/

        /*For demo related to Before, After and Around Plugin*/
        /*$product = $this->productFactory->create()->load(1);
        $product->setName('Mrp Tyres');
        //$productName = $product->getName();
        $productId = $product->getIdBySku('24-UB02');*/
        /*-----------------------------------------------------------------*/


        /*Demo for sort order related concept*/
        /*echo "Main function call<br> ";*/
        /*---------------------------------------*/

        /*$message = new \Magento\Framework\DataObject(array("greeting" => "Good Afternoon"));
        $this->_eventManager->dispatch('custom_event', ['greeting'=> $message]);
        echo $message->getGreeting();*/

        /*$id = $this->http->getParam('id',0);

        if($id == 1){
            $this->heavyService->heavyServiceMessage();
        }else{
            echo "Heavy service not instantiated<br>";
        }*/

   }
}

