<div class="related">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<!-- Default panel contents -->
				<div class="panel-heading"><h4><?php echo __('Related Wheels'); ?></h4>
					<?php if (!empty($currentModel['Wheel'])): ?>
					<table class="table table-hover table-condensed cf">
					<thead class="cf">
						<th><?php echo __('Id'); ?></th>
						<th><?php echo __('Title'); ?></th>
						<th><?php echo __('User Id'); ?></th>
						<th><?php echo __('Pack Id'); ?></th>
						<th><?php echo __('Created'); ?></th>
						<th><?php echo __('Modified'); ?></th>
						<th class="actions"><?php echo __('Actions'); ?></th>
					</thead>
					<?php foreach ($currentModel['Wheel'] as $wheel): ?>
						<tr>
							<td data-title="<?php echo __('Id',false); ?>"><?php echo $wheel['id']; ?></td>
							<td data-title="<?php echo __('Title',false); ?>"><?php echo $wheel['title']; ?></td>
							<td data-title="<?php echo __('User',false); ?>"><?php echo $wheel['user_id']; ?></td>
							<td data-title="<?php echo __('Pack',false); ?>"><?php echo $wheel['pack_id']; ?></td>
							<td data-title="<?php echo __('Created',false); ?>"><?php echo $wheel['created']; ?></td>
							<td data-title="<?php echo __('Modified',false); ?>"><?php echo $wheel['modified']; ?></td>
							<td class="actions">
								<?php echo $this->Html->link(__('View'), array('controller' => 'wheels', 'action' => 'view', $wheel['id'])); ?>
								<?php echo $this->Html->link(__('Edit'), array('controller' => 'wheels', 'action' => 'edit', $wheel['id'])); ?>
								<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'wheels', 'action' => 'delete', $wheel['id']), array(), __('Are you sure you want to delete # %s?', $wheel['id'])); ?>
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
				<?php echo $this->Html->link(__('New Wheel'), array('controller' => 'wheels', 'action' => 'add'),array('class' => 'btn btn-primary btn-lg btn-block')); ?>
			</div>
		</div>
	</div>
</div>	