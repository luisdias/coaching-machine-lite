<div class="row">
	<?php if ( isset($coachee_id) ) { ?>
        <div class="col-md-12">		
            <h2><?php echo $this->Session->read('Coachee.User.name'); ?></h2>
        </div>
	<?php } ?>
    <div class="col-md-12">
    <?php echo $this->element('meetings_today'); ?>
    </div>
    <div class="col-md-12">
    <?php echo $this->element('late_payments'); ?>
    </div>
    <div class="col-md-12">
    <?php echo $this->element('meetings_week'); ?>
    </div>
    <div class="col-md-12">
    <?php echo $this->element('next_payments'); ?>
    </div>
    <div class="col-md-12">
    <?php echo $this->element('coach_performance'); ?>
    </div>
</div>
