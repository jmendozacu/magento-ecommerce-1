<?php
/**
 * Created by PhpStorm.
 * User: prabhat
 * Date: 25/7/19
 * Time: 5:03 PM
 */

namespace EcommerceBuilder\PlatformSetup\Block;

use Magento\Framework\View\Element\Template;
use EcommerceBuilder\PlatformSetup\Model\ResourceModel\Author\CollectionFactory as CollectionFactory;

class Data extends Template
{
    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * Data constructor.
     * @param Template\Context $context
     * @param array $data
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(Template\Context $context,
                                array $data = [],
                                CollectionFactory $collectionFactory)
    {
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context, $data);
    }

    /**
     * @return \EcommerceBuilder\PlatformSetup\Model\Author[]
     */
    public function getItems(){
        return $this->collectionFactory->create()->getItems();
    }

}