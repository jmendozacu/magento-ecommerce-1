<?php


namespace SimplifiedMagento\VipDatabaseSchema\Controller\Page;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use SimplifiedMagento\VipDatabaseSchema\Model\VipMemberFactory;

class Index extends Action
{
    protected $vipMemberFactory;

    public function __construct(Context $context, VipMemberFactory $vipMemberFactory)
    {
        $this->vipMemberFactory = $vipMemberFactory;
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
        $vipMember = $this->vipMemberFactory->create();

        //Get operation
        /*
        $member = $vipMember->load(1);
        var_dump($member->getData());*/

        //update operation
        /*$member = $vipMember->load(2);
        $member->setAddress('new Updated address');
        $member->save();
        var_dump($member->getData());*/

        //insert operation
       /* $vipMember->addData(['name'=>'Devi','address'=>'DeviKaghar','status'=>true,'phone_number'=>'1234567890']);
        $vipMember->save();*/

       //Delete operation
        /*$member = $vipMember->load(4);
        $member->delete();*/

        //Getting all data through collection
        $collection = $vipMember->getCollection()
        ->addFieldToSelect(array('name','status'))
        ->addFieldToFilter('status',array('eq' => 1));

        foreach ($collection as $item){
            print_r($item->getData());
            echo "<br>";
        }


    }
}