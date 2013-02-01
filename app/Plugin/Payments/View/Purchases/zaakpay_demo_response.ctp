<div class="hero-unit">
    <h2><?php echo __('Song'); ?></h2>
    <table cellpadding="0" cellspacing="0" width="100%" class="table table-condensed">

        <?php
        if ($original_response['responseCode'] == '100') {
            ?>
            <tr>
                <td>
                    Your transaction for Order Id <?php echo $original_response['orderId'];?> has been successfully
                    completed.
                </td>
            </tr>
            <?php
        } else {
            echo $response;
        }

        ?>
    </table>
</div>
