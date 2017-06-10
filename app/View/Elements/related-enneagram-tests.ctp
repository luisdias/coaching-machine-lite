<div class="related">
	<h3><?php echo __('Related Enneagram Tests'); ?></h3>
	<?php if (!empty($currentModel['EnneagramTest'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Pack Id'); ?></th>
		<th><?php echo __('Test Date'); ?></th>
		<th><?php echo __('Type One'); ?></th>
		<th><?php echo __('Type Two'); ?></th>
		<th><?php echo __('Type Three'); ?></th>
		<th><?php echo __('Type Four'); ?></th>
		<th><?php echo __('Type Five'); ?></th>
		<th><?php echo __('Type Six'); ?></th>
		<th><?php echo __('Type Seven'); ?></th>
		<th><?php echo __('Type Eight'); ?></th>
		<th><?php echo __('Type Nine'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($currentModel['EnneagramTest'] as $enneagramTest): ?>
		<tr>
			<td><?php echo $enneagramTest['id']; ?></td>
			<td><?php echo $enneagramTest['title']; ?></td>
			<td><?php echo $enneagramTest['user_id']; ?></td>
			<td><?php echo $enneagramTest['pack_id']; ?></td>
			<td><?php echo $enneagramTest['test_date']; ?></td>
			<td><?php echo $enneagramTest['type_one']; ?></td>
			<td><?php echo $enneagramTest['type_two']; ?></td>
			<td><?php echo $enneagramTest['type_three']; ?></td>
			<td><?php echo $enneagramTest['type_four']; ?></td>
			<td><?php echo $enneagramTest['type_five']; ?></td>
			<td><?php echo $enneagramTest['type_six']; ?></td>
			<td><?php echo $enneagramTest['type_seven']; ?></td>
			<td><?php echo $enneagramTest['type_eight']; ?></td>
			<td><?php echo $enneagramTest['type_nine']; ?></td>
			<td><?php echo $enneagramTest['created']; ?></td>
			<td><?php echo $enneagramTest['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'enneagram_tests', 'action' => 'view', $enneagramTest['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'enneagram_tests', 'action' => 'edit', $enneagramTest['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'enneagram_tests', 'action' => 'delete', $enneagramTest['id']), array(), __('Are you sure you want to delete # %s?', $enneagramTest['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Enneagram Test'), array('controller' => 'enneagram_tests', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>