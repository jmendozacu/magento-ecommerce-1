<?php


namespace SimplifiedMagento\FirstModule\Observer;

use Magento\Framework\Event\Observer;

use Magento\Framework\Event\ObserverInterface;

class PostReview implements ObserverInterface
{

    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        $object = $observer->getEvent()->getObject();
        $data = $object->getData();

        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/review.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info($data);
    }
}