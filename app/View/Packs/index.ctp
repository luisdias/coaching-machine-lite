<div class="packs index">
	<?php if ( isset($coachee_id) ) { ?>
	<div class="row">
		<div class="col-md-12">		
			<h2><?php echo $coachee_name; ?></h2>
		</div>
	</div>			
	<?php } else { ?>
	
	<div class="row">
		<?php 
		echo $this->Form->create('Pack', array(
			'url' => array_merge(
					array(
						'action' => 'find'
					),
					$this->params['pass']
				)
		));	
		?>
		<div class="col-md-6">
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
		<div class="col-md-6">
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
	<h2><?php echo __('Packs'); ?>
	<?php echo $this->Html->link(__('New'), array('action' => 'add'),array('class' => 'btn btn-primary pull-right')); ?>
	</h2>
	<div id="no-more-tables">
		<table class="table table-hover table-condensed cf">
			<thead class="cf">				
				<tr>
					<?php if ( !isset($coachee_id) ) { ?>
					<th><?php echo $this->Paginator->sort('user_id',__('User',false)); ?></th>
					<?php } ?>
					<th><?php echo $this->Paginator->sort('status',__('Status',false)); ?></th>
					<th><?php echo $this->Paginator->sort('title',__('Title',false)); ?></th>
					<th><?php echo $this->Paginator->sort('number_of_meetings',__('Meetings',false)); ?></th>
					<th><span class="pull-right"><?php echo $this->Paginator->sort('meeting_price',__('Price',false)); ?></span></th>
					<th><span class="pull-right"><?php echo __('Total',false); ?></span></th>
					<th><?php echo $this->Paginator->sort('start_date',__('Start',false)); ?></th>
					<th><?php echo $this->Paginator->sort('end_date',__('End',false)); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php $subtotal = array();?>
				<?php foreach ($packs as $pack): ?>			
				<tr>
					<?php if ( !isset($coachee_id) ) { ?>
					<td data-title="<?php echo __('User',false); ?>">
					<?php echo $this->Html->link($pack['User']['name'], array('controller' => 'users', 'action' => 'view', $pack['User']['id'])); ?>&nbsp;
					</td>
					<?php } ?>
					<td data-title="<?php echo __('Status',false); ?>"><?php echo h($pack['Pack']['status']); ?>&nbsp;</td>
					<td data-title="<?php echo __('Title',false); ?>"><?php echo h($pack['Pack']['title']); ?>&nbsp;</td>
					<td data-title="<?php echo __('Meetings',false); ?>"><?php echo h($pack['Pack']['number_of_meetings']); ?>&nbsp;</td>
					<td data-title="<?php echo __('Price',false); ?>"><span class="pull-right"><?php echo CakeNumber::currency($pack['Pack']['meeting_price'],$pack['User']['currency']); ?>&nbsp;</span></td>
					<td data-title="<?php echo __('Total',false); ?>"><span class="pull-right"><?php echo '<b>' . CakeNumber::currency($pack['Pack']['number_of_meetings'] * $pack['Pack']['meeting_price'],$pack['User']['currency']). '</b>'; ?>&nbsp;</span></td>
					<td data-title="<?php echo __('Start',false); ?>"><?php echo h($pack['Pack']['start_date']); ?>&nbsp;</td>				
					<td data-title="<?php echo __('End',false); ?>"><?php echo h($pack['Pack']['end_date']); ?>&nbsp;</td>
					<td data-title="<?php echo __('Actions',false); ?>">
						<div class="btn-group">
							<button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
								<?php echo __('Select'); ?> <span class="caret"></span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li><?php echo $this->Html->link(__('View'), array('action' => 'view', $pack['Pack']['id'])); ?></li>
								<li><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $pack['Pack']['id'])); ?></li>
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
                                          array('action'=>'delete',$pack['Pack']['id'])
                                       ),
                                       'escape' => false), 
                                false);
                                ?>							                        
								</li>
								<li role="separator" class="divider"></li>
								<li><?php echo $this->Html->link(__('Calendar'), array('controller' => 'tasks','action' => 'calendar', $pack['User']['id'], $pack['Pack']['id'])); ?></li>								
							</ul>
						</div>							
					</td>
				</tr>
				<?php 
				if ( !array_key_exists($pack['User']['currency'],$subtotal) ) {
					$subtotal[$pack['User']['currency']] = 0;					
				}
				$subtotal[$pack['User']['currency']] += ( $pack['Pack']['number_of_meetings'] * $pack['Pack']['meeting_price'] );
				?>
				<?php endforeach; ?>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>
					<?php
					foreach ($subtotal as $key => $total):
						echo '<span class="pull-right">';
						echo '<b>';
						echo ( empty($key) ? '???' : $key) ;
						echo ' : ';
						echo CakeNumber::currency($total,$key);
						echo '</b>';
						echo '</span>';
						echo '<br>';
					endforeach;
					?>					
					</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				
			</tbody>
		</table>
		
		<?php echo $this->element('pagination'); ?>
	</div>
	</div>
	</div>
</div>
<?php echo $this->element('delete-dialog'); ?>
<?php echo $this->Html->script('delete-index.js', array('block' => 'scriptBottom')); ?>