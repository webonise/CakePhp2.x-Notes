<?php
    echo $this->Html->css(array('inner-custom'), 'stylesheet', array('inline' => false));
?>
<div class="hero-unit">
    <h2>Payment Process </h2>

    <div>
        <h3>Please wait we are redirecting you to the payment gateway.....</h3>
    </div>

    <form action="https://api.zaakpay.com/transact" method="post" id="paymentForm">
        <?php
        echo $formHtml;
        ?>
    </form>
</div>


<script type="text/javascript">
    $(document).ready(function () {
        $("#paymentForm").submit();
    });
</script>