<div class="payments form">
	<div class="row">
		<div class="panel panel-default panel-primary">
			<div class="panel-heading"><h3>
			<?php echo ( $this->params['action'] == 'add' ? __('Add Payment') : __('Edit Payment')); ?>
			</h3></div>
			<div class="panel-body">				  
				<?php echo $this->Form->create('Payment'); ?>
				<?php echo $this->Form->input('id'); ?>
				<div class="form-group">
					<label class="control-label" for="PaymentUserId"><?php echo __('User'); ?></label>
					<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
					<?php
					$attributes = array(
						'label' => false, 
						'class' => 'form-control',
						'empty' => __('---Select the user----',false)
					);
					if ( isset($coachee_id) ) {
						$attributes['disabled'] = 'disabled';
						$attributes['default'] = $coachee_id;
					}					
					echo $this->Form->input('user_id',$attributes);
					if ( isset($coachee_id) ) {
						unset($attributes['class']);
						unset($attributes['empty']);
						unset($attributes['disabled']);
						unset($attributes['default']);
						$attributes['type'] = 'hidden';
						$attributes['value'] = $coachee_id;
						echo $this->Form->input('user_id',$attributes);					
					}					
					?>
				</div>

				<div class="form-group">
					<label class="control-label" for="PaymentPackId"><?php echo __('Pack'); ?></label>
					<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
					<?php
					$attributes = array(
						'label' => false, 
						'class' => 'form-control',
						'empty' => __('---Select the pack----',false)
					);
					
					if (isset($coachee_id)) {
						$attributes['disabled'] = 'disabled';
						$attributes['default'] = $active_pack_id;
					}						
					echo $this->Form->input('pack_id',$attributes); 
					if ( isset($coachee_id) ) {
						unset($attributes['class']);
						unset($attributes['empty']);
						unset($attributes['disabled']);
						unset($attributes['default']);
						$attributes['type'] = 'hidden';
						$attributes['value'] = $active_pack_id;
						echo $this->Form->input('pack_id',$attributes);					
					}
					?>
				</div>

				<div class="form-group">
					<label class="control-label" for="PaymentNumber"><?php echo __('Number'); ?></label>
					<span class="glyphicon glyphicon-star" aria-hidden="true"></span>					
					<?php
					$attributes = array(
						'label' => false, 
						'class' => 'form-control',
						'placeholder' => __('Insert the Number',false)
					);
					if ($this->params['action'] == 'add' && isset($coachee_id) && isset($active_pack_id)) {
						$attributes['value'] = $next_number;
					}
					echo $this->Form->input('number',$attributes); 
					?>
				</div>				
				
				<div class="form-group">
					<label class="control-label" for="PaymentDueAmont"><?php echo __('Due Amont'); ?></label>
					<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
					<?php
					$attributes = array('label' => false, 'class' => 'form-control','placeholder' => __('Insert the due amont',false));
					echo $this->Form->input('due_amount',$attributes); 
					?>
				</div>		

				<div class="form-group">
					<label class="control-label" for="PaymentDueDate"><?php echo __('Due Date'); ?></label>
					<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
					<?php
					$attributes = array(
						'label' => false, 
						'class' => 'form-control datepicker',
						'placeholder' => __('Insert the due date',false),
						'type' => 'text'
					);
					echo $this->Form->input('due_date',$attributes); 
					?>
				</div>

				<div class="form-group">
					<label class="control-label" for="PaymentAmont"><?php echo __('Payment Amont'); ?></label>
					<?php
					$attributes = array('label' => false, 'class' => 'form-control','placeholder' => __('Insert the due amont',false));
					echo $this->Form->input('payment_amount',$attributes); 
					?>
				</div>		

				<div class="form-group">
					<label class="control-label" for="PaymentDate"><?php echo __('Payment Date'); ?></label>
					<?php
					$attributes = array(
						'label' => false, 
						'class' => 'form-control datepicker',
						'placeholder' => __('Insert the due date',false),
						'type' => 'text'
					);
					echo $this->Form->input('payment_date',$attributes); 
					?>
				</div>				
				
				<div class="form-group">
				    <div class="col-sm-12 col-md-6">
                        <?php
                        echo $this->Form->button(__('Save',false), array('type' => 'submit','class' => 'btn btn-primary btn-lg btn-block mb5')); 
                        echo $this->Form->end();						
                        ?>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <?php echo $this->Html->link(__('Cancel'), array('action' => 'index'),array('class' => 'btn btn-danger btn-lg btn-block')); ?>                       
                    </div>					
				</div>					
			</div>
		</div>
	</div>
</div>
<?php echo $this->Html->script('payment-form.js', array('block' => 'scriptBottom')); ?>