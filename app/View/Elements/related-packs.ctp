<div class="related">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading"><h4><?php echo __('Related Packs'); ?></h4></div>
				<?php if (!empty($currentModel['Pack'])): ?>
				<table class="table table-hover table-condensed cf">
				<thead class="cf">
					<th><?php echo __('Status'); ?></th>
					<th><?php echo __('Meetings'); ?></th>		
					<th><?php echo __('Price'); ?></th>
					<th><?php echo __('Start'); ?></th>
					<th><?php echo __('End'); ?></th>
					<th class="actions hidden-print"><?php echo __('Actions'); ?></th>
				</thead>
				<?php foreach ($currentModel['Pack'] as $pack): ?>
					<tr>
						<td data-title="<?php echo __('Status',false); ?>"><?php echo $pack['status']; ?>&nbsp;</td>
						<td data-title="<?php echo __('Meetings',false); ?>"><?php echo $pack['number_of_meetings']; ?>&nbsp;</td>			
						<td data-title="<?php echo __('Price',false); ?>"><?php echo $pack['meeting_price']; ?>&nbsp;</td>
						<td data-title="<?php echo __('Start',false); ?>"><?php echo $pack['start_date']; ?>&nbsp;</td>
						<td data-title="<?php echo __('End',false); ?>"><?php echo $pack['end_date']; ?>&nbsp;</td>
						<td class="actions hidden-print">
							<div class="btn-group">
								<button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
									<?php echo __('Select'); ?> <span class="caret"></span>
								</button>
								<ul class="dropdown-menu" role="menu">
									<li><?php echo $this->Html->link(__('Calendar'), array('controller' => 'tasks', 'action' => 'calendar', $currentModel['User']['id'], $pack['id'])); ?></li>								
									<li><?php echo $this->Html->link(__('View'), array('controller' => 'packs', 'action' => 'view', $pack['id'])); ?></li>
									<li><?php echo $this->Html->link(__('Edit'), array('controller' => 'packs', 'action' => 'edit', $pack['id'])); ?></li>
									<li><?php echo $this->Form->postLink(__('Delete'), array('controller' => 'packs', 'action' => 'delete', $pack['id']), array(), __('Are you sure you want to delete # %s?', $pack['id'])); ?></li>
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
				<?php echo $this->Html->link(__('New Pack'), array('controller' => 'packs', 'action' => 'add'),array('class' => 'btn btn-primary btn-lg btn-block')); ?>
			</div>
		</div>
	</div>
</div>