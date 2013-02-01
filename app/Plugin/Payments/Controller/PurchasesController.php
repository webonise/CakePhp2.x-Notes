<?php
App::uses('PaymentsAppController', 'Payments.Controller');
/**
 * PurchasesController
 *
 */
class PurchasesController extends PaymentsAppController
{

    public $components = array('Payments.ZaakPay', 'RequestHandler');
    public $helpers = array('Html', 'Form', 'Js');

    public $uses = array('Payments.Purchase', 'Payments.Wallet', 'Payments.Transaction', 'Payments.OrderSong', 'Payments.Cart', 'TopUp', 'AlbumSong');

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('zaakpay_demo', 'zaakpay_demo_post_data', 'zaakpay_demo_response');
    }

    public function beforeRender()
    {
        parent::beforeRender();

    }

    /*Zaak pay demo integration*/
    function zaakpay_demo()
    {
        $ZaakMerchantIdentifier = $this->ZaakPay->config->zaakConfig['ZaakMerchantIdentifier'];
        // Set them to view
        $this->set(compact('ZaakMerchantIdentifier'));
    }

    function zaakpay_demo_post_data()
    {
        if (!empty($this->request->data)) {
            $all = $this->ZaakPay->getAllParams();

            $checksum = $this->ZaakPay->calculateChecksum($all);

            $formHtml = $this->ZaakPay->outputForm($checksum);

            $this->set(compact('formHtml'));
        }
    }

    public function zaakpay_demo_response()
    {
        $original_response = $this->request->data;

        $recd_checksum = $this->request->data['checksum'];
        $all = $this->ZaakPay->getAllParams();

        $checksum_check = $this->ZaakPay->verifyChecksum($recd_checksum, $all);
        $response = $this->ZaakPay->outputResponse($checksum_check);

        $this->set(compact('response', 'original_response'));

        $this->zaakpay_update_demo($original_response['orderId']);
    }

    public function zaakpay_update_demo($orderId)
    {

        $this->autoRender = false;

        $fields = array('orderId' => $orderId, 'mode' => "0", 'updateDesired' => '7',
            'updateReason' => 'Settlement',
            'merchantIdentifier' => $this->ZaakPay->config->zaakConfig['ZaakMerchantIdentifier'],);

        $this->ZaakPay->zaakpay_update_api($fields);

    }

    public function zaakpay_demo_update_response()
    {
        $this->log('>>>>> Inside zaakpay_demo_update_response Action');
        $original_response = $this->request->data;

        $recd_checksum = $this->request->data['checksum'];
        $all = $this->ZaakPay->getAllParams();

        $checksum_check = $this->ZaakPay->verifyChecksum($recd_checksum, $all);
        $response = $this->ZaakPay->outputResponse($checksum_check);

        //$this->set(compact('response', 'original_response'));
        $this->log('>>>> Done zaakpay_demo_update_response');
        //        $this->log($response);
    }

/*Zaak pay demo integration*/

    public function payment_confirmation($message = null)
    {
        $this->layout = 'home';
        $this->set(compact('message'));
    }

}	 

