<div class="tasks view">
	<div class="row"">
		<div class="col-sm-9">
			<div class="panel panel-default">
				<div class="panel-heading"><!--<a href="#" class="pull-right">View all</a>--> <h4><?php echo __('Task') . ' : ' . $task['Task']['title']; ?></h4></div>
				<div class="panel-body">
					<h2><i class="glyphicon glyphicon-tasks pull-right"></i></h2>
					<div class="clearfix"></div>
					<hr>
					<dl>
						<dt><?php echo __('Id'); ?></dt>
						<dd>
							<?php echo h($task['Task']['id']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('User'); ?></dt>
						<dd>
							<?php echo $this->Html->link($task['User']['name'], array('controller' => 'users', 'action' => 'view', $task['User']['id'])); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Pack'); ?></dt>
						<dd>
							<?php echo $this->Html->link($task['Pack']['title'], array('controller' => 'packs', 'action' => 'view', $task['Pack']['id'])); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Title'); ?></dt>
						<dd>
							<?php echo h($task['Task']['title']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Description'); ?></dt>
						<dd>
							<?php echo h($task['Task']['description']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('When'); ?></dt>
						<dd>
							<?php echo $this->element('task-date',array(
							'repeat_type' => $task['Task']['repeat_type'],
							'date' => $task['Task']['start_date'],
							'time' => $task['Task']['time'],
							'sunday' => $task['Task']['sunday'],
							'monday' => $task['Task']['monday'],
							'tuesday' => $task['Task']['tuesday'],
							'wednesday' => $task['Task']['wednesday'],
							'thursday' => $task['Task']['thursday'],
							'friday' => $task['Task']['friday'],
							'saturday' => $task['Task']['saturday'],
							'day_of_the_month' => $task['Task']['day_of_the_month']
							)); 
							?>
							&nbsp;
						</dd>
						<dt><?php echo __('Start Date'); ?></dt>
						<dd>
							<?php echo h($task['Task']['start_date']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Time'); ?></dt>
						<dd>
							<?php echo h($task['Task']['time']); ?>
							&nbsp;
						</dd>
						
						<dt><?php echo __('End Date'); ?></dt>
						<dd>
							<?php echo h($task['Task']['end_date']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('With Whom'); ?></dt>
						<dd>
							<?php echo h($task['Task']['with_whom']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Obstacles'); ?></dt>
						<dd>
							<?php echo h($task['Task']['obstacles']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Benefits'); ?></dt>
						<dd>
							<?php echo h($task['Task']['benefits']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Reminders'); ?></dt>
						<dd>
							<?php echo h($task['Task']['reminders']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Punishments'); ?></dt>
						<dd>
							<?php echo h($task['Task']['punishments']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Celebrations'); ?></dt>
						<dd>
							<?php echo h($task['Task']['celebrations']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Created'); ?></dt>
						<dd>
							<?php echo h($task['Task']['created']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Modified'); ?></dt>
						<dd>
							<?php echo h($task['Task']['modified']); ?>
							&nbsp;
						</dd>
					</dl>
				</div>
			</div>
		</div>

		<div class="col-sm-3">
			<div class="well">
				<h3><?php echo __('Actions'); ?></h3>
				<ul class="list-unstyled">
					<li><?php echo $this->Html->link(__('Edit Task'), array('action' => 'edit', $task['Task']['id'])); ?> </li>
					<li><?php echo $this->Form->postLink(__('Delete Task'), array('action' => 'delete', $task['Task']['id']), array(), __('Are you sure you want to delete # %s?', $task['Task']['id'])); ?> </li>
					<li><?php echo $this->Html->link(__('List Tasks'), array('action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('New Task'), array('action' => 'add')); ?> </li>
				</ul>		
			</div>
		</div>			
	</div>
</div>					
<div id="no-more-tables">
<?php echo $this->element('related-actions',array('currentModel' => $task))?>
</div><!-- no-more-tables -->