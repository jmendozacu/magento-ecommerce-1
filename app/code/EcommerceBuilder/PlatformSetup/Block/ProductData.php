<?php
/**
 * Created by PhpStorm.
 * User: prabhat
 * Date: 26/7/19
 * Time: 1:18 PM
 */

namespace EcommerceBuilder\PlatformSetup\Block;

use Magento\Framework\View\Element\Template;
use \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;

class ProductData extends Template
{
    protected $_productCollectionFactory;

    /**
     * ProductData constructor.
     * @param Template\Context $context
     * @param CollectionFactory $productCollectionFactory
     * @param array $data
     */
    public function __construct(Template\Context $context,
                                CollectionFactory $productCollectionFactory ,
                                array $data = [])
    {
        $this->_productCollectionFactory = $productCollectionFactory;
        parent::__construct($context, $data);
    }

    /**
     * @return \Magento\Catalog\Model\ResourceModel\Product\Collection
     */
    public function getProductCollection(){
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->setPageSize(3);
        $collection->getItems();

        return $collection;
    }

}