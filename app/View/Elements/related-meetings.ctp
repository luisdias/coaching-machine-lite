<div class="related">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading"><h4><?php echo __('Related Meetings'); ?></h4></div>			
				<?php if (!empty($currentModel['Meeting'])): ?>
				<table class="table table-hover table-condensed cf">
				<thead class="cf">
					<th><?php echo __('Pack'); ?></th>
					<th><?php echo __('Number'); ?></th>	
					<th><?php echo __('Date'); ?></th>
					<th><?php echo __('Time'); ?></th>
					<th class="actions hidden-print"><?php echo __('Actions'); ?></th>
				</thead>
				<?php foreach ($currentModel['Meeting'] as $meeting): ?>
					<tr>
						<td data-title="<?php echo __('Pack',false); ?>"><?php echo $meeting['pack_id']; ?>&nbsp;</td>
						<td data-title="<?php echo __('Number',false); ?>"><?php echo $meeting['number']; ?>&nbsp;</td>
						<td data-title="<?php echo __('Date',false); ?>"><?php echo $meeting['date']; ?>&nbsp;</td>
						<td data-title="<?php echo __('Time',false); ?>"><?php echo $meeting['time']; ?>&nbsp;</td>
						<td data-title="<?php echo __('Actions',false); ?>" class="actions hidden-print">
							<div class="btn-group">
								<button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
									<?php echo __('Select'); ?> <span class="caret"></span>
								</button>
								<ul class="dropdown-menu" role="menu">
									<li><?php echo $this->Html->link(__('View'), array('controller' => 'meetings', 'action' => 'view', $meeting['id'])); ?></li>
									<li><?php echo $this->Html->link(__('Edit'), array('controller' => 'meetings', 'action' => 'edit', $meeting['id'])); ?></li>
									<li><?php echo $this->Form->postLink(__('Delete'), array('controller' => 'meetings', 'action' => 'delete', $meeting['id']), array(), __('Are you sure you want to delete # %s?', $meeting['id'])); ?></li>
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
		<div class="col-md-12 actions">
			<?php echo $this->Html->link(__('New Meeting'), array('controller' => 'meetings', 'action' => 'add'),array('class' => 'btn btn-primary btn-lg btn-block')); ?>
		</div>
	</div>
</div>	