<?php
/**
 * Created by PhpStorm.
 * User: prabhat
 * Date: 26/7/19
 * Time: 11:43 AM
 */

namespace EcommerceBuilder\PlatformSetup\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Config
{
    const XML_PATH_ENABLED = 'author/general/enabled';

    private $scopeConfig;

    public function __construct(ScopeConfigInterface  $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    public function isEnabled()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_ENABLED);
    }

}