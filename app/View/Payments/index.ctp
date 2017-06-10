<div class="payments index">
	<?php if ( isset($coachee_id) ) { ?>
	<div class="row">
		<div class="col-md-12">		
			<h2><?php echo $coachee_name; ?></h2>
		</div>
	</div>			
	<?php } else { ?>

	<div class="row">
		<?php 
		echo $this->Form->create('Payment', array(
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
	
	<h2><?php echo __('Payments'); ?>
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
					<th><span class="pull-right"><?php echo $this->Paginator->sort('due_amount',__('Due Amount',true)); ?></span></th>
					<th><?php echo $this->Paginator->sort('due_date',__('Due Date',true)); ?></th>
					<th><span class="pull-right"><?php echo $this->Paginator->sort('payment_amount',__('Payment Amount',true)); ?></span></th>
					<th><?php echo $this->Paginator->sort('payment_date',__('Payment Date',true)); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php $subtotal1 = array();?>
				<?php $subtotal2 = array();?>
				<?php foreach ($payments as $payment): ?>
				<tr>
					<?php if ( !isset($coachee_id) ) { ?>
					<td data-title="<?php echo __('User',false); ?>">
						<?php echo $this->Html->link($payment['User']['name'], array('controller' => 'users', 'action' => 'view', $payment['User']['id'])); ?>
					</td>
					<?php } ?>
					<td data-title="<?php echo __('Pack',false); ?>">
						<?php echo $this->Html->link($payment['Pack']['title'], array('controller' => 'packs', 'action' => 'view', $payment['Pack']['id'])); ?>
					</td>
					<td data-title="<?php echo __('Number',false); ?>"><?php echo h($payment['Payment']['number']); ?>&nbsp;</td>
					<td data-title="<?php echo __('Due Amount',false); ?>"><span class="pull-right"><?php echo CakeNumber::currency($payment['Payment']['due_amount'],$payment['User']['currency']); ?>&nbsp;</span></td>
					<td data-title="<?php echo __('Due Date',false); ?>"><?php echo h($payment['Payment']['due_date']); ?>&nbsp;</td>
					<td data-title="<?php echo __('Payment Amount',false); ?>"><span class="pull-right"><?php echo CakeNumber::currency($payment['Payment']['payment_amount'],$payment['User']['currency']); ?>&nbsp;</span></td>
					<td data-title="<?php echo __('Payment Date',false); ?>"><?php echo h($payment['Payment']['payment_date']); ?>&nbsp;</td>
					<td data-title="<?php echo __('Actions',false); ?>" class="actions">
						<div class="btn-group">
							<button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
								<?php echo __('Select'); ?> <span class="caret"></span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li><?php echo $this->Html->link(__('View'), array('action' => 'view', $payment['Payment']['id'])); ?></li>
								<li><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $payment['Payment']['id'])); ?></li>
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
                                          array('action'=>'delete',$payment['Payment']['id'])
                                       ),
                                       'escape' => false), 
                                false);
                                ?>								    
								</li>
							</ul>
						</div>					
					</td>
				</tr>
				<?php 
				if ( !array_key_exists($payment['User']['currency'],$subtotal1) ) {
					$subtotal1[$payment['User']['currency']] = 0;					
				}
				$subtotal1[$payment['User']['currency']] += $payment['Payment']['due_amount'];
				
				if ( !array_key_exists($payment['User']['currency'],$subtotal2) ) {
					$subtotal2[$payment['User']['currency']] = 0;					
				}
				$subtotal2[$payment['User']['currency']] += $payment['Payment']['payment_amount'];				
				?>								
				<?php endforeach; ?>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>
					<?php
					foreach ($subtotal1 as $key => $total):
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
					<td>
					<?php
					foreach ($subtotal2 as $key => $total):
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