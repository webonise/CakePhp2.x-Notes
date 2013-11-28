<div class="hero-unit">
    <?php if(!empty($page)){?>
    <h3><?php echo $page['Page']['title']; ?></h3>

    <p><?php echo $page['Page']['body']; ?></p>
    <?php }else{
        ?>
    <h1>404 :) Page Not Found</h1>
    <?php
}?>
</div>