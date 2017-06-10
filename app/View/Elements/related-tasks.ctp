<div class="related">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading"><h4><?php echo __('Related Tasks'); ?></h4></div>
				<?php if (!empty($currentModel['Task'])): ?>
				<table class="table table-hover table-condensed cf">
				<thead class="cf">
					<th><?php echo __('Pack'); ?></th>
					<th><?php echo __('Title'); ?></th>
					<th><?php echo __('Date'); ?></th>
					<th><?php echo __('Time'); ?></th>
					<th class="actions hidden-print"><?php echo __('Actions'); ?></th>
				</thead>
				<?php foreach ($currentModel['Task'] as $task): ?>
					<tr>
						<td data-title="<?php echo __('Pack',false); ?>"><?php echo $task['pack_id']; ?>&nbsp;</td>
						<td data-title="<?php echo __('Title',false); ?>"><?php echo $task['title']; ?>&nbsp;</td>
						<td data-title="<?php echo __('Date',false); ?>"><?php echo $task['start_date']; ?>&nbsp;</td>
						<td data-title="<?php echo __('Time',false); ?>"><?php echo $task['time']; ?>&nbsp;</td>
						<td data-title="<?php echo __('Actions',false); ?>" class="actions hidden-print">
							<div class="btn-group">
								<button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
									<?php echo __('Select'); ?> <span class="caret"></span>
								</button>
								<ul class="dropdown-menu" role="menu">
									<li><?php echo $this->Html->link(__('View'), array('controller' => 'tasks', 'action' => 'view', $task['id'])); ?></li>
									<li><?php echo $this->Html->link(__('Edit'), array('controller' => 'tasks', 'action' => 'edit', $task['id'])); ?></li>
									<li><?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tasks', 'action' => 'delete', $task['id']), array(), __('Are you sure you want to delete # %s?', $task['id'])); ?></li>
								</ul>
							</div>							
						</td>
					</tr>
				<?php endforeach; ?>
				</table>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">	
			<div class="actions">
				<?php echo $this->Html->link(__('New Task'), array('controller' => 'tasks', 'action' => 'add'),array('class' => 'btn btn-primary btn-lg btn-block')); ?>
			</div>
		</div>
	</div>
</div>