<?php

namespace One97\Paytm\Controller\Standard;

use Magento\Framework\App\CsrfAwareActionInterface;
use Magento\Framework\App\Request\InvalidRequestException;
use Magento\Framework\App\RequestInterface;

class Redirect extends \One97\Paytm\Controller\Paytm implements CsrfAwareActionInterface
{
    public function createCsrfValidationException(
        RequestInterface $request
    ): ?InvalidRequestException {
        return null;
    }

    public function validateForCsrf(RequestInterface $request): ?bool
    {
        return true;
    }

    public function execute()
    {
        $promo='';
        if(isset($_GET['promo'])){
            if(trim($_GET['promo'])!=''){
                $promo=$_GET['promo'];
            }
        }
        $order = $this->getOrder();
        if ($order->getBillingAddress())
        {
            $order->setState("pending_payment")->setStatus("pending_payment");
            $order->addStatusToHistory($order->getStatus(), "Customer was redirected to paytm.");
            $order->save();
            
            if($promo!=''){
                $order->paytmPromoCode=$promo;
            }
            $this->getResponse()->setRedirect(
                $this->getPaytmModel()->buildPaytmRequest($order)
            );
        }
        else
        {
            $this->_cancelPayment();
            $this->_paytmSession->restoreQuote();
            $this->getResponse()->setRedirect(
                $this->getPaytmHelper()->getUrl('checkout')
            );
        }
    }
}