<?php
echo $this->Html->css(array('inner-custom'), 'stylesheet', array('inline' => false));
?>
<div class="container">
    <div class="row">
        <div class="span8 leftColumn">
            <div class="account">
                <div class="profile-block">
                    <h2 class="heading">Manage Cms Pages</h2>
                    <div style="float: right;"><?php echo $this->Html->link('Back' , 'javascript:void(0);' , array('onclick' => 'javascript:history.go(-1);')) ?></div>

                    <div class="formWrapper">

                        <table cellpadding="0" cellspacing="0" width="100%" class="table table-condensed">
                            <tr>
                                <th>#</th>
                                <th><?php echo $this->Paginator->sort('title');?></th>
                                <th class="actions"><?php echo __('Actions');?></th>
                            </tr>
                            <?php
                            if ($this->Paginator->counter(array('pages')) > 0) {
                                $count = 1;
                                foreach ($pages as $page): ?>
                                    <tr>
                                        <td><?php echo $count; ?>&nbsp;</td>
                                        <td><?php echo h($page['Page']['title']); ?>&nbsp;</td>
                                        <td class="actions">
                                            <?php echo $this->Html->link(__(''), array('plugin' => 'cms', 'controller' => 'pages', 'action' => 'view', $page['Page']['slug']), array('class' => ' icon-eye-open', 'title' => 'View','rel'=>'tooltip')); ?>
                                            <?php echo $this->Html->link(__(''), array('action' => 'edit', $page['Page']['id']), array('class' => 'icon-pencil', 'title' => 'Edit','rel'=>'tooltip')); ?>
                                            <?php // echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $page['Page']['id']), null, __('Are you sure you want to delete # %s?', $page['Page']['id'])); ?>
                                        </td>
                                    </tr>
                                    <?php
                                    $count++;
                                endforeach;
                            } else {
                                h('No CMS Pages added yet.');
                            }
                            ?>
                        </table>

                        <div class="paging">
                            <?php

                            echo $this->element('pagination');
                            ?>
                        </div>
                    </div>
                    <div class="actions">

                    </div>

                </div>

            </div>

        </div>

        <?php echo $this->element('right_panel', array('showDisciplineAndSubject' => false,
        'askQuestion' => false, 'relatedSubjects' => false, 'discipline' => '', 'showSubject' => false,'showAdminPanel'=>true));?>

    </div>
</div>

