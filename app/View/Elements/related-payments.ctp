<div class="related">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading"><h4><?php echo __('Related Payments'); ?></h4></div>
				<?php if (!empty($currentModel['Payment'])): ?>
				<table class="table table-hover table-condensed cf">
				<thead class="cf">
					<th><?php echo __('Pack'); ?></th>
					<th><?php echo __('Number'); ?></th>		
					<th><?php echo __('Due Amount'); ?></th>
					<th><?php echo __('Due Date'); ?></th>
					<th><?php echo __('Amount'); ?></th>
					<th><?php echo __('Date'); ?></th>
					<th class="actions hidden-print"><?php echo __('Actions'); ?></th>
				</thead>
				<?php foreach ($currentModel['Payment'] as $payment): ?>
					<tr>
						<td data-title="<?php echo __('Pack',false); ?>"><?php echo $payment['pack_id']; ?>&nbsp;</td>
						<td data-title="<?php echo __('Number',false); ?>"><?php echo $payment['number']; ?>&nbsp;</td>			
						<td data-title="<?php echo __('Due Amount',false); ?>"><?php echo $payment['due_amount']; ?>&nbsp;</td>
						<td data-title="<?php echo __('Due Date',false); ?>"><?php echo $payment['due_date']; ?>&nbsp;</td>
						<td data-title="<?php echo __('Value',false); ?>"><?php echo $payment['payment_amount']; ?>&nbsp;</td>
						<td data-title="<?php echo __('Date',false); ?>"><?php echo $payment['payment_date']; ?>&nbsp;</td>
						<td data-title="<?php echo __('Actions',false); ?>" class="actions hidden-print">
							<div class="btn-group">
								<button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
									<?php echo __('Select'); ?> <span class="caret"></span>
								</button>
								<ul class="dropdown-menu" role="menu">
									<li><?php echo $this->Html->link(__('View'), array('controller' => 'payments', 'action' => 'view', $payment['id'])); ?></li>
									<li><?php echo $this->Html->link(__('Edit'), array('controller' => 'payments', 'action' => 'edit', $payment['id'])); ?></li>
									<li><?php echo $this->Form->postLink(__('Delete'), array('controller' => 'payments', 'action' => 'delete', $payment['id']), array(), __('Are you sure you want to delete # %s?', $payment['id'])); ?></li>
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
				<?php echo $this->Html->link(__('New Payment'), array('controller' => 'payments', 'action' => 'add'),array('class' => 'btn btn-primary btn-lg btn-block')); ?>
			</div>
		</div>
	</div>

</div>