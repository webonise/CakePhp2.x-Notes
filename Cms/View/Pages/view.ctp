<div class="container">
    <div class="row">
        <div class="span12">
            <ul class="breadcrumb">
                <li><a href="/" class="blankLink">MyOpenCourses</a> <span class="divider"></span></li>
                <li><?php echo $page['Page']['title']; ?></li>
            </ul>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="span8">

            <div class="titleHeading">

                <?php echo $page['Page']['title'];?>
            </div>
            <p><?php echo $page['Page']['body']; ?></p>
        </div>

        <?php echo $this->element('right_panel', array('showDisciplineAndSubject' => false,
        'askQuestion' => false, 'relatedSubjects' => false, 'discipline' => '', 'showSubject' => false, 'back' => true));?>
    </div>
    <p>&nbsp;</p>
</div>

<?php
echo $this->Html->meta('keywords', $page['Page']['meta_keywords'], array('inline' => false));
echo $this->Html->meta('description', $page['Page']['meta_description'], array('inline' => false));
?>