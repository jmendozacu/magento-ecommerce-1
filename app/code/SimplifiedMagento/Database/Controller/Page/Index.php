<?php


namespace SimplifiedMagento\Database\Controller\Page;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use SimplifiedMagento\Database\Model\AffiliateMembersFactory;
//use SimplifiedMagento\Database\Model\ResourceModel\AffiliateMembers;

class Index extends Action
{

    protected $affiliateMembersFactory;

    public function __construct(Context $context,AffiliateMembersFactory $affiliateMembersFactory )
    {
        $this->affiliateMembersFactory = $affiliateMembersFactory;
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


        $affiliateMember = $this->affiliateMembersFactory->create();

        /*Getting data from database*/
       /* $member = $affiliateMember->load(1);
        $member->setAddress('new Updated address');
        $member->save();
        var_dump($member->getData());*/
       /*---------------------------------------------*/

        /*Inserting New Data in database*/
       /*$affiliateMember->addData(['name'=>'Rand','address'=>'chinchpokali','status'=>true,'phone_number'=>'1234567890']);
       $affiliateMember->save();*/
       /*-------------------------------------------------*/

        /*deleting Data*/
        /*$member = $affiliateMember->load(3);
        $member->delete();*/


        $collection = $affiliateMember->getCollection();

        foreach($collection as $item){
            print_r($item->getData());
            echo '</br>';
        }

    }
}