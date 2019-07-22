<?php
namespace SimplifiedMagento\SFDCProductSync\Logger;

use Monolog\Logger;

class ProductSyncHandler extends \Magento\Framework\Logger\Handler\Base
{
    /**
     *Logging level
     *@var int
     */
    protected $_loggerType = Logger::INFO; // Your level type
    /**
     *File Name
     *@var string
     */
    protected $fileName = '/var/log/sfdc.product.sync.log';

}