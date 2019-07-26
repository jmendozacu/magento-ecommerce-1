<?php
/**
 * Created by PhpStorm.
 * User: prabhat
 * Date: 25/7/19
 * Time: 8:31 PM
 */

namespace EcommerceBuilder\PlatformSetup\Cron;

use EcommerceBuilder\PlatformSetup\Model\AuthorFactory;
use EcommerceBuilder\PlatformSetup\Model\Config;

class AddAuthor
{
    private $authorFactory;

    private $config;

    /**
     * AddAuthor constructor.
     * @param AuthorFactory $authorFactory
     * @param Config $config
     */
    public function __construct(AuthorFactory $authorFactory, Config $config)
    {
        $this->authorFactory = $authorFactory;
        $this->config = $config;
    }

    /**
     *Save author info
     */
    public function execute()
    {
        if ($this->config->isEnabled()) {
            $this->authorFactory->create()
                ->setAuthorName('Author1' . time())
                ->setEmail(time() . 'author@gmail.com')
                ->setAffliation('Company' . time())
                ->save();
        }
    }
}