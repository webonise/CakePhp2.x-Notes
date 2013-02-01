
<style type="text/css">
    #busy-indicator { display:none; }
</style>
<div class="hero-unit">
    <h2>Payment Process via Zaak Pay</h2>

    <form action="/payments/purchases/zaakpay_demo_post_data" method="post">
        <input type="hidden" name="merchantIdentifier" value="<?php echo $ZaakMerchantIdentifier;?>"/>
        <input type="hidden" name="orderId" value="<?php echo time();?>"/>
        <input type="hidden" name="txnType" value="1"/>
        <input type="hidden" name="zpPayOption" value="1"/>
        <input type="hidden" name="mode" value="1"/>
        <input type="hidden" name="currency" value="INR"/>
        <input type="hidden" name="amount" value="<?php echo 2 * 100;?>"/>
        <input type="hidden" name="merchantIpAddress" value="<?php echo $_SERVER['SERVER_ADDR']?>"/>
        <input type="hidden" name="purpose" value="1"/>

        <input type="hidden" name="productDescription" value="<?php echo 'demo product';?>"/>
        <input type="hidden" name="txnDate" id="txnDate" value="<?php echo date('Y-m-d');?>"/>
        <input type="hidden" name="resource_id" value="<?php echo '42343';?>"/>


        <center>


        </center>
        <center><?php echo $this->Html->image('indicator.gif', array('id' => 'busy-indicator')); ?></center>
        <table width="650px;" id = 'purchase_form'>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td width="50%" align="right" valign="middle">Item Name</td>
                <td width="50%" align="center" valign="middle"><b>Temp Product</b></td>
            </tr>
            <tr>
                <td width="50%" align="right" valign="middle">Amount</td>
                <td width="50%" align="center" valign="middle"><b>INR  2.00</b></td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td width="50%" align="right" valign="middle">Buyer Email<font style="color: #F82229">*</font></td>
                <td width="50%" align="center" valign="middle">

                    <input type="text" name="buyerEmail" id="email"
                           value="Chandu@KakaSaraf.com"/></td>
            </tr>
            <tr>
                <td width="50%" align="right" valign="middle">Buyer First Name<font style="color: #F82229">*</font></td>
                <td width="50%" align="center" valign="middle">

                    <input type="text" name="buyerFirstName" id="first_name"
                           value="Chandu"/></td>
            </tr>
            <tr>
                <td width="50%" align="right" valign="middle">Buyer Last Name<font style="color: #F82229">*</font></td>
                <td width="50%" align="center" valign="middle">

                    <input type="text" name="buyerLastName" id="last_name"
                           value="Kaka"/></td>
            </tr>
            <tr>
                <td width="50%" align="right" valign="top">Buyer Address<font style="color: #F82229">*</font></td>
                <td width="50%" align="center" valign="middle">
                    <textarea rows="3" cols="5" id="address" name="buyerAddress"></textarea>

                </td>
            </tr>
            <tr>
                <td width="50%" align="right" valign="middle">Buyer City<font style="color: #F82229">*</font></td>
                <td width="50%" align="center" valign="middle">

                    <input type="text" id="city" name="buyerCity" value="Pune"/>
                </td>
            </tr>
            <tr>
                <td width="50%" align="right" valign="middle">Buyer State<font style="color: #F82229">*</font></td>
                <td width="50%" align="center" valign="middle">

                    <input type="text" id="state" name="buyerState" value="MH"/>
                </td>
            </tr>
            <tr>
                <td width="50%" align="right" valign="middle">Buyer Country<font style="color: #F82229">*</font></td>
                <td width="50%" align="center" valign="middle">

                    <input type="text" id="country" name="buyerCountry" value="India"/>
                </td>
            </tr>
            <tr>
                <td width="50%" align="right" valign="middle">Buyer Pincode</td>
                <td width="50%" align="center" valign="middle">
                    <input type="text" name="buyerPincode" value="411021"/>
                </td>
            </tr>
            <tr>
                <td width="50%" align="right" valign="middle">Buyer Phone No<font style="color: #F82229">*</font></td>
                <td width="50%" align="center" valign="middle">
                    <input type="text" id="phone_number" name="buyerPhoneNumber" value="9766251100"/>
                </td>
            </tr>
        </table>
        <table align="center">
            <tr>
                <td width="50%" align="right" valign="middle">&nbsp;</td>
                <td width="50%" align="center" valign="middle">
                    <table>
                        <tr>
                            <td>
                                <?php
                                echo $this->Form->submit(__('Pay Now'), array('class' => 'btn btn-success' , 'div' => false));
                                ?>
                            </td>
                            <td width="50%" align="center" valign="middle">
                                <?php
                                echo $this->Html->link(__('Cancel'), 'javascript:void(0);', array('onclick' => 'javascript:history.go(-1);', 'class' => 'btn btn-warning'));
                                ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>


        </table>

    </form>
</div>