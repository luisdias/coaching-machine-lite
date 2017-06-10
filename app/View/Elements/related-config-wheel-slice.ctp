<div class="related">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading"><h4><?php echo __('Related Wheel Slices'); ?></h4></div>
				<?php if (!empty($configwheel['ConfigWheelSlice'])): ?>
				<table class="table table-hover table-condensed cf">
				<thead class="cf">
					<th><?php echo __('Title'); ?></th>
					<th><?php echo __('Color'); ?></th>
					<th><?php echo __('Wheel Slice Group Id'); ?></th>
					<th><?php echo __('Created'); ?></th>
					<th><?php echo __('Modified'); ?></th>
					<th class="actions hidden-print"><?php echo __('Actions'); ?></th>
				</thead>
				<?php foreach ($configwheel['ConfigWheelSlice'] as $configWheelSlice): ?>
					<tr>
						<td data-title="<?php echo __('Title',false); ?>"><?php echo $configWheelSlice['title']; ?>&nbsp;</td>
						<td data-title="<?php echo __('Color',false); ?>"><?php echo $configWheelSlice['color']; ?>&nbsp;</td>
						<td data-title="<?php echo __('Wheel Slice Group Id',false); ?>"><?php echo $configWheelSlice['config_wheel_slice_group_id']; ?>&nbsp;</td>
						<td data-title="<?php echo __('Created',false); ?>"><?php echo $configWheelSlice['created']; ?>&nbsp;</td>
						<td data-title="<?php echo __('Modified',false); ?>"><?php echo $configWheelSlice['modified']; ?>&nbsp;</td>
						<td class="actions hidden-print">
							<div class="btn-group">
								<button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
									<?php echo __('Select'); ?> <span class="caret"></span>
								</button>
								<ul class="dropdown-menu" role="menu">
									<li><?php echo $this->Html->link(__('View'), array('controller' => 'config_wheel_slices', 'action' => 'view', $configWheelSlice['id'])); ?></li>
									<li><?php echo $this->Html->link(__('Edit'), array('controller' => 'config_wheel_slices', 'action' => 'edit', $configWheelSlice['id'])); ?></li>
									<li><?php echo $this->Form->postLink(__('Delete'), array('controller' => 'config_wheel_slices', 'action' => 'delete', $configWheelSlice['id']), array(), __('Are you sure you want to delete # %s?', $configWheelSlice['id'])); ?></li>
								</ul>
							</div>							
						</td>
					</tr>
				<?php endforeach; ?>
				</table>
			<?php endif; ?>
	<div class="row">
		<div class="col-md-12">	
			<div class="actions">
				<?php echo $this->Html->link(__('New Config Wheel Slice'), array('controller' => 'config_wheel_slices', 'action' => 'add'),array('class' => 'btn btn-primary btn-lg btn-block')); ?>
			</div>
		</div>
	</div>
</div>