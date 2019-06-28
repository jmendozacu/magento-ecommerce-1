<?php


namespace SimplifiedMagento\HelloWorld\ViewModel;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class HelloView implements ArgumentInterface
{

    protected $product;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->product= $productRepository;
    }

    /**
     * @return string
     */
    public function getHelloWorld(){
        return "This is from custom Block";
    }

    /**
     * @return array
     */
    public function getArrayResult(){
        return $arr = [
            "poor",
            "average",
            "good",
            "excellent"
        ];
    }

    public function getProduct(){
        $product = $this->product->get('24-MB01');
        return $product->getName();
    }

}