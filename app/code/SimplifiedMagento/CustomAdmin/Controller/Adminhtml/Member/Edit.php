<?php


namespace SimplifiedMagento\CustomAdmin\Controller\Adminhtml\Member;

use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;
use SimplifiedMagento\Database\Model\AffiliateMembers;
use Magento\Framework\Registry;

class Edit extends Action
{
    /**
     * @var PageFactory
     */
    protected $pageFactory;
    /**
     * @var AffiliateMembers
     */
    protected $affiliateMembers;

    protected  $registry;

    public function __construct(Action\Context $context, PageFactory $pageFactory, AffiliateMembers $affiliateMembers, Registry $registry)
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
        $this->affiliateMembers = $affiliateMembers;
        $this->registry = $registry;

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
        $id = $this->getRequest()->getParam("id");
        $model = $this->affiliateMembers;

        if($id){
            $model->load($id);
            if(!$model->getId()){
                $this->messageManager->addErrorMessage(__('This Member does not exist'));
                $result = $this->resultRedirectFactory->create();
                return $result->setPath('affiliate/member/index');
            }
        }

        $data = $this->_getSession()->getFormData(true);

        if(!empty($data)){
            $model->setData($data);
        }

        $this->registry->register("member", $model);

        $resultPage = $this->pageFactory->create();

        $resultPage->addBreadcrumb($id ?  __("Edit Member"): __("Add A new Member"),
                                    $id ?  __("Edit Member"): __("Add A new Member"));

        if($id){
            $resultPage->getConfig()->getTitle()->prepend('Edit');
        }else{
            $resultPage->getConfig()->getTitle()->prepend('Add');
        }

        return $resultPage;

    }
}