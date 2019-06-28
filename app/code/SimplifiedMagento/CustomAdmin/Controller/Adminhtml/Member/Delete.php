<?php


namespace SimplifiedMagento\CustomAdmin\Controller\Adminhtml\Member;


use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\ForwardFactory;
use Magento\Backend\Model\View\Result\RedirectFactory;
use Magento\Framework\View\Result\PageFactory;
use SimplifiedMagento\Database\Model\AffiliateMembers;

class Delete extends Action
{

    private $pageFactory;

    protected $forwardFactory;

    protected $model;

    protected  $redirectFactory;

    public function __construct(Action\Context $context, ForwardFactory $forwardFactory, PageFactory $pageFactory,
                                AffiliateMembers $affiliateMembers,
                                RedirectFactory $redirectFactory)
    {
        $this->redirectFactory = $redirectFactory;
        $this->model = $affiliateMembers;
        $this->forwardFactory = $forwardFactory;
        $this->pageFactory = $pageFactory;
        parent::__construct($context);
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('SimplifiedMagento_CustomAdmin::parent');
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
        $resultRedirect = $this->redirectFactory->create();

        $id = $this->getRequest()->getParam('id');

        if($id){
            $model = $this->model;
            $model->load($id);

            try{
                $model->delete();
                $this->messageManager->addSuccessMessage(__('Member Deleted'));
            }catch (\Exception $e){
                $this->messageManager->addErrorMessage(__($e->getMessage()));
                return $resultRedirect->setPath('*/*/edit',['id' => $id]);
            }
        }

        return $resultRedirect->setPath('*/*/index');

    }
}
