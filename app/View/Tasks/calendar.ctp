<?php echo $this->Html->css('calendar/fullcalendar.min'); ?>
<div id='calendar'></div>
<?php echo $this->Html->script('calendar/moment.min.js', array('block' => 'scriptBottom')); ?>
<?php echo $this->Html->script('calendar/fullcalendar.min.js', array('block' => 'scriptBottom')); ?>
<?php echo $this->Html->script('calendar/lang/pt.js', array('block' => 'scriptBottom')); ?>
<?php echo $this->Html->scriptStart(array('block' => 'scriptBottom')); ?>
<?php echo $js; ?>
<?php echo $this->Html->scriptEnd(); ?>
<?php echo $this->Html->script('blockui/jquery.blockUI.js', array('block' => 'scriptBottom')); ?>