<h2>Paypal IPN helper for CakePHP 2.x</h2>

<h3>Instruction for use:</h3>
Copy paypal_ipn folder in vendor.<br>
Copy paypal.php to helper folder.
<h3>Basic Example :</h3>


<h4>In Controller :</h4>
<pre>
/* Create your payment info array as */
$payment_infos = array(
                'productName' => $productname,
                'orderId' => $order_id,
                'amount' => $amount,
                'custom' => $custom, //OrderId
                'product' => $products, //Array of product
                'paypal_state' => 'live' //Live or sandbox
            );
</pre>

<h4>In helper :</h4>
<pre>
/* Change these URLs according to your application */
   $paypalObj->add_field('return', "http://" . $_SERVER['SERVER_NAME'] . "/store/products/handleIPN?state=success");
   $paypalObj->add_field('notify_url', "http://" . $_SERVER['SERVER_NAME'] . "/store/products/handleIPN?state=success");
   $paypalObj->add_field('cancel_return', "http://" . $_SERVER['SERVER_NAME']); // . "/payments/handleIPN?state=cancel");
</pre>

<h4>In Views :</h4>
<pre>
  if (isset($payment_infos) && !empty($payment_infos)) {
                    echo $this->Paypal->processPayment($payment_infos);
                }
</pre>
<br>
Page will redirect to paypal site.
