<div class="tasks index">
	<?php if ( isset($coachee_id) ) { ?>
	<div class="row">
		<div class="col-md-12">		
			<h2><?php echo $coachee_name; ?></h2>
		</div>
	</div>			
	<?php } else { ?>
	
	<div class="row">
		<?php 
		echo $this->Form->create('Task', array(
			'url' => array_merge(
					array(
						'action' => 'find'
					),
					$this->params['pass']
				)
		));	
		?>
		<div class="col-md-4">
			<div class="form-group">
			<?php
			$attributes = array(
				'required' => false,
				'label' => false, 
				'class' => 'form-control',
				'empty' => __('---All---',false),
				'options' => $users,
				'type' => 'select'
			);												
			echo $this->Form->input('user_id',$attributes); 
			?>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
			<?php
			$attributes = array(
				'required' => false,
				'label' => false, 
				'class' => 'form-control',
				'empty' => __('---All---',false),
				'options' => $packs,
				'type' => 'select'				
			);												
			echo $this->Form->input('pack_id',$attributes); 
			?>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
			<?php
			echo $this->Form->button('<i class="glyphicon glyphicon-filter"></i> ' . __('Filter'), array(
			'div' => false,
			'class' => 'btn btn-default',
			'type' => 'submit',
			'escape' => false
			));
			?>
			</div>
		</div>
		<?php echo $this->Form->end(); ?>		
	</div>	
	
	<?php } ?>	
	
	<div class="row">
	<div class="col-md-12">		
	
	<h2><?php echo __('Tasks'); ?>
	<?php echo $this->Html->link(__('New'), array('action' => 'add'),array('class' => 'btn btn-primary pull-right')); ?>	
	</h2>	
	<div id="no-more-tables">
		<table class="table table-hover table-condensed cf">
			<thead class="cf">				
				<tr>
					<?php if ( !isset($coachee_id) ) { ?>
					<th><?php echo $this->Paginator->sort('user_id',__('User',true)); ?></th>
					<?php } ?>
					<th><?php echo $this->Paginator->sort('pack_id',__('Pack',true)); ?></th>					
					<th><?php echo $this->Paginator->sort('number',__('Number',true)); ?></th>
					<th><?php echo $this->Paginator->sort('title',__('Title',true)); ?></th>
					<th><?php echo __('When'); ?></th>
					<th><?php echo $this->Paginator->sort('start_date',__('Start Date',true)); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($tasks as $task): ?>
				<tr>
					<?php if ( !isset($coachee_id) ) { ?>
					<td data-title="<?php echo __('User',false); ?>">
						<?php echo $this->Html->link($task['User']['name'], array('controller' => 'users', 'action' => 'view', $task['User']['id'])); ?>
					</td>
					<?php } ?>
					<td data-title="<?php echo __('Pack',false); ?>">
						<?php echo $this->Html->link($task['Pack']['title'], array('controller' => 'packs', 'action' => 'view', $task['Pack']['id'])); ?>
					</td>
					<td data-title="<?php echo __('Number',false); ?>"><?php echo h($task['Task']['number']); ?>&nbsp;</td>
					<td data-title="<?php echo __('Title',false); ?>"><?php echo h($task['Task']['title']); ?>&nbsp;</td>
					<td data-title="<?php echo __('When',false); ?>">

					
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
					</td>
					<td data-title="<?php echo __('End Date',false); ?>"><?php echo h($task['Task']['start_date']); ?>&nbsp;</td>
					<td data-title="<?php echo __('Actions',false); ?>" class="actions">
						<div class="btn-group">
							<button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
								<?php echo __('Select'); ?> <span class="caret"></span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li><?php echo $this->Html->link(__('View'), array('action' => 'view', $task['Task']['id'])); ?></li>
								<li><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $task['Task']['id'])); ?></li>
								<li>
                                <?php 
                                echo $this->Html->link(
                                    __('Delete'), 
                                    '#', 
                                    array(
                                       'class'=>'btn-delete',
                                       'data-toggle'=> 'modal',
                                       'data-target' => '#confirm-delete-dialog',
                                       'data-action'=> Router::url(
                                          array('action'=>'delete',$task['Task']['id'])
                                       ),
                                       'escape' => false), 
                                false);
                                ?>								    
								</li>
								<li role="separator" class="divider"></li>
								<li><?php echo $this->Html->link(__('Calendar'), array('controller' => 'tasks','action' => 'calendar', $task['User']['id'], $task['Pack']['id'])); ?></li>
							</ul>
						</div>						
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		
		<?php echo $this->element('pagination'); ?>	
	</div>
	</div>	
	</div>
</div>
<?php echo $this->element('delete-dialog'); ?>
<?php echo $this->Html->script('delete-index.js', array('block' => 'scriptBottom')); ?>