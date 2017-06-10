<div class="row related">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading"><h4><?php echo __('Related Actions'); ?></h4></div>
				<?php if (!empty($currentModel['Action'])): ?>
				<table class="table table-hover table-condensed cf">
					<thead class="cf">
					<tr>
						<th><?php echo __('Date'); ?></th>
						<th><?php echo __('Day'); ?></th>
						<th><?php echo __('Created'); ?></th>
						<th><?php echo __('Day'); ?></th>
						<th></th>
					</tr>
					</thead>
					<?php foreach ($currentModel['Action'] as $action): ?>
						<tr>
							<td data-title="<?php echo __('Date',false); ?>"><?php echo $action['action_date']; ?></td>
							<td data-title="<?php echo __('Day',false); ?>"><?php echo $this->element('day-of-the-week',array('date' => $action['action_date'])); ?></td>
							<td data-title="<?php echo __('Created',false); ?>"><?php echo $action['created']; ?></td>
							<td data-title="<?php echo __('Day',false); ?>"><?php echo $this->element('day-of-the-week',array('date' => $action['created'])); ?></td>
							<td><?php echo $this->element('evaluate-action',array('action_date' => $action['action_date'],'created' => $action['created'])); ?></td>
						</tr>
					<?php endforeach; ?>
				</table>
			<?php endif; ?>
			</div>
		</div>
	</div>
</div>				