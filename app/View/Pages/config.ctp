<div class="config-page">

<div class="row"><div class="col-sm-12"><h2><?php echo __('Configuration'); ?></h2></div></div>
<div class="row">
	<div class="col-sm-4">
		<div class="panel panel-primary pn">
			<div class="panel-heading">
			<?php echo $this->Html->link(__('Select'), array('controller' => 'configDefaults','action' => 'index'),array('class'=>'pull-right')); ?>
			<h4><?php echo __('System Defaults'); ?></h4></div>
			<p>

			</p>
			<div class="row">
			<?php echo $this->Html->image('gear-157763_640.png', array('alt' => '', 'class' => 'img-responsive center-block')); ?>		
			</div>
		</div>
	</div>

	<?php  if ( file_exists('pro.txt') ) { ?>

	<div class="col-sm-4">
		<div class="panel panel-primary pn">
			<div class="panel-heading">
			<?php echo $this->Html->link(__('Select'), array('controller' => 'configWheels','action' => 'index'),array('class'=>'pull-right')); ?>
			<h4><?php echo __('Wheels'); ?></h4></div>
			<p>

			</p>
			<div class="row">
			<?php echo $this->Html->image('hand-577356_640.png', array('alt' => '', 'class' => 'img-responsive center-block')); ?>		
			</div>
		</div>
	</div>
	
	<div class="col-sm-4">
		<div class="panel panel-primary pn">
			<div class="panel-heading">
			<?php echo $this->Html->link(__('Select'), array('controller' => 'configSurveys','action' => 'index'),array('class'=>'pull-right')); ?>
			<h4><?php echo __('Surveys'); ?></h4></div>
			<p>

			</p>
			<div class="row">
			<?php echo $this->Html->image('checklist-154274_640.png', array('alt' => '', 'class' => 'img-responsive center-block')); ?>		
			</div>
		</div>
	</div>	

	<?php } ?>

</div>

<?php  if ( file_exists('pro.txt') ) { ?>

<div class="row">
	<div class="col-sm-4">
		<div class="panel panel-primary pn">
			<div class="panel-heading">
			<?php echo $this->Html->link(__('Select'), array('controller' => 'configLabelSets','action' => 'index'),array('class'=>'pull-right')); ?>
			<h4><?php echo __('Label Sets'); ?></h4></div>
			<p>

			</p>
			<div class="row">
			<?php echo $this->Html->image('key-ring-157133_640.png', array('alt' => '', 'class' => 'img-responsive center-block')); ?>		
			</div>
		</div>
	</div>	
</div>

<?php } ?>

</div>