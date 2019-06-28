<?php


namespace SimplifiedMagento\CustomAdmin\Controller\Adminhtml\Member;

use Magento\Backend\Model\View\Result\ForwardFactory;
use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\RedirectFactory;
use Magento\Framework\View\Result\PageFactory;
use SimplifiedMagento\Database\Model\AffiliateMembers;

class Save extends Action
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
        $data = $this->getRequest()->getPostValue();

        $resultRedirect = $this->resultRedirectFactory->create();
        if($data) {
            $member = $this->getRequest()->getParam('member');

            if(array_key_exists('entity_id', $member)){
                $id = $member['entity_id'];
                $model = $this->model->load($id);
            }

            $model = $this->model->setData($data['member']);

        }

        try{
            $model->save();
            $this->messageManager->addSuccessMessage(__('Affiliate Member saved successfully'));
            $this->_getSession()->setFormData(false);
            if($this->getRequest()->getParam('back')){
                return $resultRedirect->setPath('*/*/edit',['id' => $model->getId(),'_current' => true]);
            }
            return $resultRedirect->setPath('*/*/index');
        }catch(\Exception $e){
            $this->messageManager->addErrorMessage($e->getMessage());
        }

        return $resultRedirect->setPath('*/*/index');
    }
}