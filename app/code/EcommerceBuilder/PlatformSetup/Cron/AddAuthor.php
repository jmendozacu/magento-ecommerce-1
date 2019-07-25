<?php
/**
 * Created by PhpStorm.
 * User: prabhat
 * Date: 25/7/19
 * Time: 8:31 PM
 */

namespace EcommerceBuilder\PlatformSetup\Cron;

use EcommerceBuilder\PlatformSetup\Model\AuthorFactory;

class AddAuthor
{
    private $authorFactory;

    public function __construct(AuthorFactory $authorFactory)
    {
        $this->authorFactory = $authorFactory;
    }

    public function execute(){
        $this->authorFactory->create()
            ->setAuthorName('Author1'.time())
            ->setEmail(time().'author@gmail.com')
            ->setAffliation('Company'.time())
            ->save();
    }
}