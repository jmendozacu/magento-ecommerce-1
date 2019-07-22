<?php
/**
 * Created by PhpStorm.
 * User: prabhat
 * Date: 18/7/19
 * Time: 11:37 AM
 */

namespace SimplifiedMagento\SFDCProductSync\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Exception;
use GuzzleHttp\Client as GuzzleClient;
use SimplifiedMagento\SFDCProductSync\Constants\AppConstants as AppConstant;

class SFDCConfigHelper extends AbstractHelper
{
    /**
     * Function to get auth token from salesforce
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getSFDCAuthCode()
    {
        $params = [
            'form_params' => [
                'client_id' => AppConstant::CLIENT_ID,
                'client_secret' => AppConstant::CLIENT_SECRET,
                'grant_type' => AppConstant::GRANT_TYPE,
                'username' => AppConstant::USER_NAME,
                'password' => AppConstant::PASSWORD
            ]
        ];

        $url = "https://login.salesforce.com".AppConstant::SFDC_TOKEN_GENERATE_ROUTE;

        try {
            $client = new GuzzleClient();
            $sfdcResponse = $client->request('POST', $url, $params);
            return ['status' => true, 'auth' => json_decode($sfdcResponse->getBody()->getContents(), true)];
        } catch (Exception $e) {
            return ['status' => false, 'error' => $e->getMessage()];
        }
    }
}