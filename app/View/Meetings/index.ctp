<div class="meetings index">
	<?php if ( isset($coachee_id) ) { ?>
	<div class="row">
		<div class="col-md-12">		
			<h2><?php echo $coachee_name; ?></h2>
		</div>
	</div>			
	<?php } else { ?>
	
	<div class="row">
		<?php 
		echo $this->Form->create('Meeting', array(
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
	<h2><?php echo __('Meetings'); ?>
	<?php echo $this->Html->link(__('New'), array('action' => 'add'),array('class' => 'btn btn-primary pull-right')); ?>
	</h2>	
	<div id="no-more-tables">
		<table class="table table-hover table-condensed cf">
			<thead class="cf">				
				<tr>
					<?php if ( !isset($coachee_id) ) { ?>
					<th><?php echo $this->Paginator->sort('user_id',__('User',false)); ?></th>
					<?php } ?>
					<th><?php echo $this->Paginator->sort('pack_id',__('Pack',false)); ?></th>					
					<th><?php echo $this->Paginator->sort('number',__('Number',false)); ?></th>
					<th><?php echo $this->Paginator->sort('date',__('Date',false)); ?></th>
					<th><?php echo __('Day'); ?></th>
					<th><?php echo $this->Paginator->sort('date',__('Time',false)); ?></th>
					<th class="actions hidden-print"><?php echo __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
					<?php foreach ($meetings as $meeting): ?>
					<tr <?php echo ( $meeting['Meeting']['created'] == $meeting['Meeting']['modified'] ? 'class="green"': '' ); ?> >
						<?php if ( !isset($coachee_id) ) { ?>					
						<td data-title="<?php echo __('User',false); ?>">
							<?php echo $this->Html->link($meeting['User']['name'], array('controller' => 'users', 'action' => 'view', $meeting['User']['id'])); ?>
						</td>
						<?php } ?>
						<td data-title="<?php echo __('Pack',false); ?>">
							<?php echo $this->Html->link($meeting['Pack']['title'], array('controller' => 'packs', 'action' => 'view', $meeting['Pack']['id'])); ?>
						</td>
						<td data-title="<?php echo __('Number',false); ?>"><?php echo h($meeting['Meeting']['number']); ?>&nbsp;</td>						
						<td data-title="<?php echo __('Date',false); ?>"><?php echo h($meeting['Meeting']['date']); ?>&nbsp;</td>
						<td data-title="<?php echo __('Day',false); ?>"><?php echo $this->element('day-of-the-week',array('date' => $meeting['Meeting']['date'])); ?></th>
						<td data-title="<?php echo __('Time',false); ?>"><?php echo h($meeting['Meeting']['time']); ?>&nbsp;</td>
						<td data-title="<?php echo __('Actions',false); ?>" class="actions hidden-print">
						<div class="btn-group">
							<button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
								<?php echo __('Select'); ?> <span class="caret"></span>
							</button>
							<ul class="dropdown-menu" role="menu">						
								<li><?php echo $this->Html->link(__('View'), array('action' => 'view', $meeting['Meeting']['id'])); ?></li>
								<li><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $meeting['Meeting']['id'])); ?></li>
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
                                          array('action'=>'delete',$meeting['Meeting']['id'])
                                       ),
                                       'escape' => false), 
                                false);
                                ?>								    
								</li>
							</ul>
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