<?php
class ZaakPayComponent extends Object
{
    public $config;

    public function initialize($controller)
    {
        $this->config = new ZaakPay_CONFIG();
    }

    function startup(&$controller)
    {
        $this->controller =& $controller;

    }

    public function beforeRender()
    {
    }

    public function shutdown()
    {
    }

    public function beforeRedirect()
    {
    }

    /**
     *AP = Album Purchase
     *SP = Song Purchase
     *WP = wallet purchase
     *WR = Wallet Recharge
     *CP = Cart Payement
     */
    public function getOrderId($type = null,$auto_order_id = null)
    {
//        $type = ucfirst($type);

        switch (strtolower($type)) {
            case 'album':
                $prefix = 'P';
                break;
            case 'song':
                $prefix = 'P';
                break;
            case 'wallet':
                $prefix = 'W';
                break;
            case 'wallet_recharge':
                $prefix = 'P';
                break;
            case 'cart':
                $prefix = 'P';
                break;
            case '' :
                $prefix = 'P';
                break;

        }
        $this->log('>>>>> orderID is : '.$prefix.$auto_order_id);
        return $prefix.$auto_order_id;
    }

    public function calculateChecksum($all)
    {
        $hash = hash_hmac('sha256', $all, $this->config->zaakConfig['ZaakSecret']);
        $checksum = $hash;
        return $checksum;
    }


    public function getAllParams($data = null)
    {
        //ksort($_POST);
        if(!empty($data) && $data != null){
            $allParams = $data;
        }else{
            $allParams = $_POST;
        }

        $all = '';
        foreach ($allParams as $key => $value) {
            if ($key != 'submit') {
                if ($key != 'checksum') {
                    $all .= "'";
                    if ($key == 'returnUrl') {
                        $all .= $this->sanitizedURL($value);
                    } else {
                        $all .= $this->sanitizedParam($value);
                    }
                    $all .= "'";
                }
            }
        }
        return $all;
    }

    public function outputForm($checksum)
    {
        //ksort($_POST);
        $html = '';
        foreach ($_POST as $key => $value) {
            if ($key != 'submit') {
                if ($key == 'returnUrl') {
                    $html .= '<input type="hidden" name="' . $key . '" value="' . $this->sanitizedURL($value) . '" />' . "\n";
                } else {
                    $html .= '<input type="hidden" name="' . $key . '" value="' . $this->sanitizedParam($value) . '" />' . "\n";
                }
            }
        }
        $html .= '<input type="hidden" name="checksum" value="' . $checksum . '" />' . "\n";

        return $html;
    }

    public function verifyChecksum($checksum, $all)
    {
        $cal_checksum = $this->calculateChecksum($all);
        $bool = 0;
        if ($checksum == $cal_checksum) {
            $bool = 1;
        }

        return $bool;
    }

    public function sanitizedParam($param)
    {
        $pattern[0] = "%,%";
        $pattern[1] = "%#%";
        $pattern[2] = "%\(%";
        $pattern[3] = "%\)%";
        $pattern[4] = "%\{%";
        $pattern[5] = "%\}%";
        $pattern[6] = "%<%";
        $pattern[7] = "%>%";
        $pattern[8] = "%`%";
        $pattern[9] = "%!%";
        $pattern[10] = "%\\$%";
        $pattern[11] = "%\%%";
        $pattern[12] = "%\^%";
        $pattern[13] = "%=%";
        $pattern[14] = "%\+%";
        $pattern[15] = "%\|%";
        $pattern[16] = "%\\\%";
        $pattern[17] = "%:%";
        $pattern[18] = "%'%";
        $pattern[19] = "%\"%";
        $pattern[20] = "%;%";
        $pattern[21] = "%~%";
        $pattern[22] = "%\[%";
        $pattern[23] = "%\]%";
        $pattern[24] = "%\*%";
        $pattern[25] = "%&%";
        $sanitizedParam = preg_replace($pattern, "", $param);
        return $sanitizedParam;
    }

    public function sanitizedURL($param)
    {
        $pattern[0] = "%,%";
        $pattern[1] = "%\(%";
        $pattern[2] = "%\)%";
        $pattern[3] = "%\{%";
        $pattern[4] = "%\}%";
        $pattern[5] = "%<%";
        $pattern[6] = "%>%";
        $pattern[7] = "%`%";
        $pattern[8] = "%!%";
        $pattern[9] = "%\\$%";
        $pattern[10] = "%\%%";
        $pattern[11] = "%\^%";
        $pattern[12] = "%\+%";
        $pattern[13] = "%\|%";
        $pattern[14] = "%\\\%";
        $pattern[15] = "%'%";
        $pattern[16] = "%\"%";
        $pattern[17] = "%;%";
        $pattern[18] = "%~%";
        $pattern[19] = "%\[%";
        $pattern[20] = "%\]%";
        $pattern[21] = "%\*%";
        $sanitizedParam = preg_replace($pattern, "", $param);
        return $sanitizedParam;
    }

    public function outputResponse($bool)
    {
        $response = '';
        foreach ($_POST as $key => $value) {
            if ($bool == 0) {
                if ($key == "responseCode") {
                    $response .= '<tr><td width="50%" align="center" valign="middle">' . $key . '</td>
						<td width="50%" align="center" valign="middle"><font color=Red>***</font></td></tr>';
                } else if ($key == "responseDescription") {
                    $response .= '<tr><td width="50%" align="center" valign="middle">' . $key . '</td>
						<td width="50%" align="center" valign="middle"><font color=Red>This response is compromised.</font></td></tr>';
                } else {
                    $response .= '<tr><td width="50%" align="center" valign="middle">' . $key . '</td>
						<td width="50%" align="center" valign="middle">' . $value . '</td></tr>';
                }
            } else {
                $response .= '<tr><td width="50%" align="center" valign="middle">' . $key . '</td>
					<td width="50%" align="center" valign="middle">' . $value . '</td></tr>';
            }
        }
        $response .= '<tr><td width="50%" align="center" valign="middle">Checksum Verified?</td>';
        if ($bool == 1) {
            $response .= '<td width="50%" align="center" valign="middle">Yes</td></tr>';
        }
        else {
            $response .= '<td width="50%" align="center" valign="middle"><font color=Red>No</font></td></tr>';
        }

        return $response;
    }

    public function error_codes()
    {
        $transaction_errors = array('100' => 'The transaction was completeted successfully.',
            '101' => 'Merchant not found. Please check your merchantIdentifier field.',
            '102' => 'Customer cancelled transaction.',
            '103' => 'Fraud Detected.',
            '104' => 'Customer Not Found.',
            '105' => 'Transaction details not matched.',
            '106' => 'IpAddress BlackListed.',
            '107' => 'Transaction Amount Limit Not Matched.',
            '108' => 'Validation Successful.',
            '109' => 'Validation Failed.',
            '110' => 'MerchantIdentifier field missing or blank.',
            '111' => 'MerchantIdentifier Not Valid.',
            '129' => 'OrderId field missing or blank.',
            '130' => 'OrderId received with request was not Valid.',
            '110' => 'Order Id Already Processed with this Merchant.',
            '131' => 'ReturnUrl field missing or blank.',
            '132' => 'ReturnUrl received with request was not Valid',
            '133' => 'BuyerEmail field missing or blank.',
            '189' => 'ReturnUrl does not match the registered domain.',
            '134' => 'BuyerEmail received with request was not Valid.',
            '135' => 'BuyerFirstName field missing or blank.',
            '136' => 'BuyerFirstName received with request was not Valid.',
            '137' => 'BuyerLastName field missing or blank.',
            '138' => 'BuyerLastName received with request was not Valid.', '139' => 'BuyerAddress field missing or blank.',
            '140' => 'BuyerAddress received with request was notValid.',
            '141' => 'BuyerCity field missing or blank.',
            '142' => 'BuyerCity received with request was not Valid.',
            '143' => 'BuyerState field missing or blank.',
            '144' => 'BuyerState received with request was not Valid.',
            '145' => 'BuyerCountry field missing or blank.',
            '146' => 'BuyerCountry received with request was not Valid.',
            '147' => 'Buyer PinCode field missing or blank.',
            '148' => 'BuyerPinCode received with request was not Valid.',
            '149' => 'BuyerPhoneNumber field missing or blank.',
            '150' => 'BuyerPhoneNumber received with request was not Valid.',
            '151' => 'TxnType field missing or blank.',
            '152' => 'TxnType received with request was not Valid.',
            '153' => 'ZpPayOption field missing or blank.',
            '154' => 'ZpPayOption received with request was not Valid.',
            '155' => 'Mode field missing or blank.',
            '156' => 'Mode received with request was not Valid.',
            '157' => 'Currency field missing or blank.',
            '158' => 'Currency received with request was not Valid.',
            '159' => 'Amout field missing or blank.',
            '160' => 'Amount received with request was not Valid.',
            '161' => 'BuyerIpAddressfield missing or blank.',
            '162' => 'BuyerIpAddress  received with request was not Valid.',
            '163' => 'Purposefield missing or blank.',
            '164' => 'Purpose received with request was not Valid.',
            '165' => 'ProductDescription field missing or blank.',
            '166' => 'ProductDescription received with request was not Valid.',
            '167' => 'Product1Description received with request was not Valid.',
            '168' => 'Product2Description received with request was not Valid.',
            '169' => 'Product3Description received with request was not Valid.',
            '170' => 'Product4Description received with request was not Valid.',
            '171' => 'ShipToAddress received with request was not Valid.',
            '172' => 'ShipToCity received with request was not Valid.',
            '173' => 'ShipToState received with request was not Valid.',
            '174' => 'ShipToCountry received with request was not Valid.',
            '175' => 'ShipToPincode received with request was not Valid.',
            '176' => 'ShipToPhoneNumber received with request was not Valid.',
            '177' => 'ShipToFirstname received with request was not Valid.',
            '178' => 'ShipToLastname received with request was not Valid.',
            '179' => 'Date is blank or Date received with request was not valid.',
            '180' => 'checksum received with request is not equal to what we calculated.',
            '181' => 'Merchant Data Complete.',
            '182' => 'Merchant Data Not Complete in Our Database.',
            '183' => 'Unfortunately, the transaction failed due to some unexpected reason in our system.',
            '400' => 'The transaction was declined by the issuing bank.',
            '401' => 'The transaction was rejected by the acquiring bank.',
            '184' => 'Update Reason blank.',
            '185' => 'Update Desired not Valid',
            '186' => 'Update Reason blank.',
            '187' => 'Update Reason Not Valid',
            '188' => 'TxnId Not Valid.',
            '189' => 'Checksum was Blank.',
            '190' => 'OrderId either not Processed or Rejected.',
            '191' => 'Merchant Identifier or Order Id was not valid.',
            '192' => 'Transaction Id received was blank.',
            '193' => 'Transaction Id Not Found in Our Database.',
            '194' => 'Bank Merchant Id was Blank.',
            '195' => 'Bank Merchant Id was not Valid.',
            '196' => 'Transaction can not be settled.',
            '197' => 'Transaction can not be canceled.',
            '198' => 'Transaction already cancelled.',
            '199' => 'Transaction already settled.',
            '200' => 'Transaction already refunded.',
            '201' => 'Transaction cannot be refunded.',
            '202' => 'Transaction updated successfully.',
            '203' => 'Transaction status could not be updated try again.',
            '204' => 'Transaction Id is not Valid',
            '205' => 'We could not found txnid in our database.',
            '206' => 'Transaction in Scheduled state.',
            '207' => 'Transaction in Initiated State.',
            '208' => 'Transaction in Processing State.',
            '209' => 'Transaction has been authorized.',
            '210' => 'Transaction has been put on hold.',
            '211' => '	Transaction is incomplete.',
            '212' => 'Transaction has been settled.',
            '213' => 'Transaction has been cancelled.',
            '214' => 'Transaction has been paid out.',
            '215' => 'Transaction has been refunded.',
            '216' => 'Order Id Not Found.',
            '217' => 'Sanity Validation was successful.',
            '218' => '	IP address field missing or blank.',
            '219' => 'Raw request field missing or blank.',
            '220' => 'RecieverEmail field missing or blank.',
            '221' => 'Request time field missing or blank.',
            '222' => 'MtxRequest field missing or blank.',
            '223' => 'Data Validation success.',
            '224' => 'Txn can not be updated.'

        );
    }


    /**
     * @name: zaakpay_update_html
     * @perpose : to cretae input fields of form for Api
     * @params : order_id and merchant deatils of Api
     * @note : For More Info Please Reffer this Url
     *  https://www.zaakpay.com/developers/update-transaction-api
     *
     * Mode 1 : Production
     * Mode 2 : Test
     * @created : 14/06/2012
     */
    public function zaakpay_update_api($params)
    {

        $all = $this->getAllParams($params);

        $checksum = $this->calculateChecksum($all);

        //post data array
        $data = array('checksum' => $checksum);

        $fields = array_merge($params, $data);

//        $this->log('fields data');
//        $this->log($fields);

        //open connection
        $ch = curl_init();

        $fields_string = '';
        foreach ($fields as $key => $value) {
            $fields_string .= $key . '=' . $value . '&';
        }

        $fields_string = substr($fields_string, 0, -1);

//        $this->log('fields string data');
//        $this->log($fields_string);

        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, 'https://api.zaakpay.com/updatetransaction');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);

        //execute post
        $result = curl_exec($ch);

        //close connection
        curl_close($ch);
    }


    public function zaakpay_update_html($orderId, $ZaakMerchantIdentifier)
    {

        $html = '<input type="hidden" name="merchantIdentifier" value="' . $ZaakMerchantIdentifier . '" />
                    <input type="hidden" name="orderId" value="' . $orderId . '" />';
        $html .= '<input type="hidden" name="mode" value="0" />
                     <input type="hidden" name="updateDesired" value="7" />
                     <input type="hidden" name="updateReason" value="Settelment For order no"' . $orderId . '/> ';


        return $html;

    }
}