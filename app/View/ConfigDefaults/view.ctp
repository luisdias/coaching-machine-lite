<?php echo $this->Html->css('slider/bootstrap-slider.min'); ?>
<?php echo $this->element('wheel-of-life-html-css',array('wheelSlices' => $configwheel['ConfigWheelSlice'])); ?>
<div class="configWheels view">
	<div class="row"">
		<div class="col-sm-9">
			<div class="panel panel-default">
				<div class="panel-heading"><!--<a href="#" class="pull-right">View all</a>--> <h4><?php echo __('Config Wheel'); ?></h4></div>
				<div class="panel-body">
					<!--<p><img src="//placehold.it/150x150" class="img-circle pull-right"> <a href="#">The Bootstrap Playground</a></p>-->
					<p>
					
					</p>
					<div class="clearfix"></div>
					<hr>
					<dl>
						<dt><?php echo __('Id'); ?></dt>
						<dd>
							<?php echo h($configwheel['ConfigWheel']['id']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Title'); ?></dt>
						<dd>
							<?php echo h($configwheel['ConfigWheel']['title']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Created'); ?></dt>
						<dd>
							<?php echo h($configwheel['ConfigWheel']['created']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Modified'); ?></dt>
						<dd>
							<?php echo h($configwheel['ConfigWheel']['modified']); ?>
							&nbsp;
						</dd>
					</dl>
				</div><!-- panel-body -->
			</div><!-- panel panel-default -->
		</div><!-- col-sm-9 -->
		
		<div class="col-sm-3">
			<div class="well">
				<h3><?php echo __('Actions'); ?></h3>
				<ul class="list-unstyled">		
					<li><?php echo $this->Html->link(__('Edit Config Wheel'), array('action' => 'edit', $configwheel['ConfigWheel']['id'])); ?> </li>
					<li><?php echo $this->Form->postLink(__('Delete Config Wheel'), array('action' => 'delete', $configwheel['ConfigWheel']['id']), array(), __('Are you sure you want to delete # %s?', $configwheel['ConfigWheel']['id'])); ?> </li>
					<li><?php echo $this->Html->link(__('List Config Wheels'), array('action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('New Config Wheel'), array('action' => 'add')); ?> </li>
					<li><?php echo $this->Html->link(__('List Config Wheel Slice Groups'), array('controller' => 'config_wheel_slice_groups', 'action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('New Config Wheel Slice Group'), array('controller' => 'config_wheel_slice_groups', 'action' => 'add')); ?> </li>
					<li><?php echo $this->Html->link(__('List Config Wheel Slices'), array('controller' => 'config_wheel_slices', 'action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('New Config Wheel Slice'), array('controller' => 'config_wheel_slices', 'action' => 'add')); ?> </li>
				</ul>
			</div>
		</div>
	</div>

	<?php echo $this->element('related-config-wheel-slice'); ?>
</div>
<?php echo $this->Html->script('chart/Chart.min.js', array('block' => 'scriptBottom')); ?>
<?php echo $this->Html->script('slider/bootstrap-slider.min.js', array('block' => 'scriptBottom')); ?>
<?php echo $this->Html->script('wheel-view.js', array('block' => 'scriptBottom')); ?>
<?php
$this->Html->scriptStart(array('block' => 'scriptBottom'));
echo $this->element('wheel-of-life-javascript',array('wheelSlices' => $configwheel['ConfigWheelSlice']));
$this->Html->scriptEnd();
?>