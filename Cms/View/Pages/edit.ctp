<?php
//echo $this->Html->css(array('/cms/css/cms'));
echo $this->Html->script(array('ckeditor/ckeditor'), false);
?>
<?php //echo $this->element('actionBar'); ?>

<div class="hero-unit">
    <?php echo $this->Form->create('Page', array('inputDefaults' => array('div' => false, 'label' => false))); ?>
    <fieldset>
        <legend><?php echo __('Edit page'); ?></legend>
        <div class="control-group">
            <label class="control-label"> Title </label>

            <div class="controls docs-input-sizes">
                <?php echo $this->Form->input('Page.title', array('maxLength' => '100', 'class' => 'input-xxlarge')); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label"> Meta Keywords </label>

            <div class="controls docs-input-sizes">
                <?php echo $this->Form->input('Page.meta_keywords', array('type' => 'text', 'maxLength' => '250', 'class' => 'input-xxlarge')); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Meta Description</label>

            <div class="controls docs-input-sizes">
                <?php echo $this->Form->input('Page.meta_description', array('type' => 'text', 'maxLength' => '250', 'class' => 'input-xxlarge')); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Details</label>

            <div class="controls docs-input-sizes">
                <?php echo $this->element('ckeditor', array('name' => 'Page.body', 'id' => 'ckeditor_text', 'description' => $this->request->data['Page']['body'])); ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Active</label>

            <div class="controls docs-input-sizes editRadioBtn">
                <?php
                $options = array('1' => 'Yes', '0' => 'No');
                $attributes = array('legend' => false, 'label' => false, 'value' => '1', 'class' => '');

                echo $this->Form->radio('is_active', $options, $attributes);
                ?>
            </div>
        </div>
        <div class="form-actions">
            <?php
            echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-success adminFormBtn' , 'div' => false));
            echo $this->Html->link(__('Cancel'), 'javascript:void(0);', array('onclick' => 'javascript:history.go(-1);', 'class' => 'btn btn-warning'));
            ?>
        </div>
    </fieldset>
    <?php echo $this->Form->end(); ?>
</div>