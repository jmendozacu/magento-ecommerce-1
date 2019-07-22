<?php
namespace SimplifiedMagento\SFDCProductSync\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class LoggerHelper extends AbstractHelper
{
    /**
     * Custom Dynamic Logging Helper
     * @param $filename
     * @param $message
     */
    public function LogInfo($filename, $message){
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/'.$filename);
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info($message);
    }

}