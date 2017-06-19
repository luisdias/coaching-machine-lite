<div class="packs form">
	<div class="row">
		<div class="panel panel-default panel-primary">
			<div class="panel-heading"><h3>
			<?php echo ( $this->params['action'] == 'add' ? __('Add Pack') : __('Edit Pack')); ?>
			</h3></div>
			<div class="panel-body">				
				<?php echo $this->Form->create('Pack'); ?>
				<?php echo $this->Form->input('id'); ?>
					<div class="form-group">
						<label class="control-label" for="PackUserId"><?php echo __('User'); ?></label>
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
						<label class="control-label" for="PackStatus"><?php echo __('Status'); ?></label>
						<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						<?php
						$options = array('Active' => __('Active',false), 'Finished' => __('Finished',false), 'Suspended' => __('Suspended',false));
						$attributes = array(
							'type'=>'select', 
							'label' => false, 
							'class' => 'form-control',
							'empty'=>__('---Select the status---'),
							'options' => $options,
							'required' => true
						);
						echo $this->Form->input('status',$attributes); 
						?>						
					</div>
					
					<div class="form-group">
						<label class="control-label" for="PackTitle"><?php echo __('Title'); ?></label>
						<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						<?php
						$attributes = array('label' => false, 'class' => 'form-control','placeholder' => __('Insert the title',false));
						echo $this->Form->input('title',$attributes); 
						?>
					</div>
					
					<div class="form-group">
						<label class="control-label" for="PackDescription"><?php echo __('Description'); ?></label>
						<?php
						$attributes = array('type'=>'textarea','label' => false, 'class' => 'form-control','placeholder' => __('Insert the description',false));
						echo $this->Form->input('description',$attributes); 
						?>
					</div>
					
					<div class="form-group">
						<label class="control-label" for="PackNumberOfMeetings"><?php echo __('Number of meetings'); ?></label>
						<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						<?php
						$attributes = array('label' => false, 'class' => 'form-control','placeholder' => __('Insert the number of meetings',false));
						echo $this->Form->input('number_of_meetings',$attributes); 
						?>
					</div>	
					
					<div class="form-group">
						<label class="control-label" for="PackMeetingPrice"><?php echo __('Meeting Price'); ?></label>
						<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						<?php
						$attributes = array('label' => false, 'class' => 'form-control','placeholder' => __('Insert the price of the meeting',false));
						echo $this->Form->input('meeting_price',$attributes); 
						?>
					</div>
					
					<div class="form-group">
						<label class="control-label" for="PackStartDate"><?php echo __('Start Date'); ?></label>
						<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						<?php
						$attributes = array(
							'label' => false, 
							'class' => 'form-control datepicker',
							'placeholder' => __('Insert the start date',false),
							'type' => 'text'
						);
						echo $this->Form->input('start_date',$attributes); 
						?>
					</div>

					<div class="form-group">
						<label class="control-label" for="PackEndDate"><?php echo __('End Date'); ?></label>
						<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						<?php
						$attributes = array(
							'label' => false, 
							'class' => 'form-control datepicker',
							'placeholder' => __('Insert the end date',false),
							'type' => 'text'
						);
						echo $this->Form->input('end_date',$attributes); 
						?>
					</div>

					<div class="form-group">
						<label class="control-label" for="PackMeetingPeriodicity"><?php echo __('Meeting Periodicity'); ?></label>
						<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						<?php
						$per = array(7 => __('Weekly',false), 15 => __('Every two weeks',false), 30 => __('Monthly',false));
						$attributes = array(
							'type'=>'select', 
							'label' => false, 
							'class' => 'form-control',
							'empty'=>__('---Select the periodicity---'),
							'options' => $per,
							'required' => true
						);
						echo $this->Form->input('meeting_periodicity',$attributes); 
						?>
					</div>		

					<div class="form-group task-time">
						<label class="control-label" for="PackMeetingTime"><?php echo __('Meeting Time'); ?></label>
						<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						<?php
						$attributes = array(
							'label' => false, 
							'class' => 'form-control timepicker',
							'placeholder' => __('Insert the time',false),
							'type' => 'text'
						);
						echo $this->Form->input('meeting_time',$attributes); 
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
<?php echo $this->Html->script('pack-form.js', array('block' => 'scriptBottom')); ?>