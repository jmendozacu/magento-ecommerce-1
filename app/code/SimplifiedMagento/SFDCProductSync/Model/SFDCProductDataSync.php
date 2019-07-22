<?php
/**
 * Created by PhpStorm.
 * User: prabhat
 * Date: 18/7/19
 * Time: 4:37 PM
 */

namespace SimplifiedMagento\SFDCProductSync\Model;

use SimplifiedMagento\SFDCProductSync\Helper\SFDCConfigHelper;
use SimplifiedMagento\SFDCProductSync\Helper\LoggerHelper;
use Magento\Catalog\Api\Data\ProductInterfaceFactory;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\ProductRepository;
use Magento\Catalog\Model\ProductFactory;
use SimplifiedMagento\SFDCProductSync\Logger\ProductSyncLogger;
use Exception;
use GuzzleHttp\Client as GuzzleClient;

class SFDCProductDataSync
{
    protected $SFDCConfigHelper;

    protected $loggerHelper;

    protected $productInterfaceFactory;

    protected $_productRepository;

    protected  $repository;

    protected $productFactory;

    protected $_logger;


    public function __construct(SFDCConfigHelper $SFDCConfigHelper, LoggerHelper $loggerHelper,
                                ProductInterfaceFactory $productInterfaceFactory,
                                ProductRepositoryInterface $repository,
                                ProductRepository $productRepository,
                                ProductFactory $productFactory, ProductSyncLogger $logger)
    {
        $this->SFDCConfigHelper = $SFDCConfigHelper;
        $this->loggerHelper = $loggerHelper;
        $this->repository = $repository;
        $this->productInterfaceFactory = $productInterfaceFactory;
        $this->_productRepository = $productRepository;
        $this->productFactory = $productFactory;
        $this->_logger = $logger;
    }

    /**
     * Function that takes sync salesforce product and insert it into magento database
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function productDataSync(){
        // Sync type
        $syncType  = 'Product';

        // SFDC table
        $sfdcTable = 'Product2';

        // Field data required from SFDC
        $fieldsName = ('Id,ProductCode,Name,IsActive,IsDeleted,SystemModstamp,price__c,product_type__c,Attribute__c');
       // $fieldsName = ('Id,ProductCode,Name,IsActive,IsDeleted,SystemModstamp,price_c,product_type_c,Attribute_c');

        // Setting max fetch limit to 1000
        $limit = 1000;
        // Getting auth response form SFDC
        $authCodeResponse = $this->SFDCConfigHelper->getSFDCAuthCode();

        // Getting auth code form SFDC
        $authCode=$authCodeResponse['auth'];

        // Check is error is returned
        if (!$authCodeResponse['status']) {
            return ['status'=>'false', 'message' => 'Auth code is failed to get'];
        }

        $sfdcProductCount = $this->getTotalSize($sfdcTable, $authCode, $syncType);

        // Variable to keep record of last product fetch
        $lastProductId = 1;

        for ($i = 0; $i <= $sfdcProductCount; $i += $limit) {

            // If i=0 fetch first 1000 records else fetch 1000 record post $i value
            if ($i == 0) {
                $query = 'Select ' . $fieldsName . ' from ' . $sfdcTable . ' order by Id ASC limit ' . $limit;
            } else {
                $query = 'Select ' . $fieldsName . ' from ' . $sfdcTable . ' WHERE Id >  ' . "'" .
                    $lastProductId . "'" . ' order by Id ASC limit ' . $limit;
            }

            // API call to SFDC
            $content = $this->requestSfdcQuery($authCode, $query, $syncType);

            //SFDC product records
            $record = $content['records'];
            $this->loggerHelper->LogInfo('sfdc.product.info',$record);


            $result = $this->insertorUpdateRecord($record);

            return $result;
        }

    }

    /**
     * Get total number of products salesforce
     * @param $type
     * @param $authCode
     * @param null $syncType
     * @param null $whereClause
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function getTotalSize($type, $authCode, $syncType = null, $whereClause = null)
    {
        if ($whereClause) {
            $query = 'Select count() from '. $type.' WHERE ' . $whereClause;
        } else {
            $query = 'Select count() from '. $type;
        }

        $content = $this->requestSfdcQuery($authCode,$query,$syncType);

        // Check if no field is fetched
        if (empty($content['totalSize'])) {
            return ['status'=>'false', 'message' => 'No Product found'];
        }

        return  $content['totalSize'];
    }

    /**
     * Query salesforce database for data
     * @param $authCode
     * @param null $query
     * @param null $syncType
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function requestSfdcQuery($authCode, $query = null, $syncType = null)
    {
        // Request URL with query
        $url   = $authCode['instance_url'] . '/services/data/v37.0/query/?q='.urlencode($query);
        // Request
        try {
            $client       = new GuzzleClient();
            $headers      = array('headers' => array('Authorization' => 'Bearer ' . $authCode['access_token']));
            $sfdcResponse = $client->request('GET', $url, $headers);
        } catch (\Exception $e) {
            return ['connection error', $e->getMessage()];
        }

        $content = json_decode($sfdcResponse->getBody()->getContents(), true);
        return $content;
    }

    /**
     * Function that save products in Magento
     * @param $products
     * @return array
     */
    public function insertorUpdateRecord($products)
    {
        $insertedProducts = array();
        $product = $this->productFactory->create();
        try{
            foreach($products as $productDetails){
                $productSku = $this->getProductBySku($productDetails['ProductCode']);

                //Insert data if product not found
                if($productSku == false){
                    array_push($insertedProducts,$productDetails['ProductCode']);
                    $product->setSku($productDetails['ProductCode']); // Set your sku here
                    $product->setName($productDetails['Name']); // Name of Product
                    $product->setStatus($productDetails['IsActive']); // Status on product enabled/ disabled 1/0
                    $product->setVisibility(4); // visibilty of product (catalog / search / catalog, search / Not visible individually)
                    $product->setTypeId($productDetails['product_type__c']); // type of product (simple/virtual/downloadable/configurable)
                    $product->setPrice($productDetails['price__c']); // price of product
                    $product->save();
                }else{
                    //saves inserted array sku
                    array_push($insertedProducts,$productSku);
                }
            }
            //Log inserted products in magento database
            $this->_logger->info('inserted product',$insertedProducts);

            //Returns succesfull messgae on saving products
            return ['status'=>'true','message'=> "Data inserted succesfull"];
        }catch (Exception $e){
            //Returns error messge if any error
            return ['status'=>'false','message'=> $e->getMessage()];
        }

    }


    /**
     * @param $sku
     * @return bool|\Magento\Catalog\Api\Data\ProductInterface|\Magento\Catalog\Model\Product|null
     */
    public function getProductBySku($sku)
    {
        try{
            return $this->_productRepository->get($sku);
        }catch (exception $e){
            return false;
        }

    }

}