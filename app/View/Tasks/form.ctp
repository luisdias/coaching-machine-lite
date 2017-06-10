<div class="tasks form">
	<div class="row">
		<div class="panel panel-default panel-primary">
			<div class="panel-heading"><h3>
			<?php echo ( $this->params['action'] == 'add' ? __('Add Task') : __('Edit Task')); ?>
			</h3></div>
			<div class="panel-body">				  
				<?php echo $this->Form->create('Task'); ?>
				<?php echo $this->Form->input('id'); ?>
					<div class="form-group">
						<label class="control-label" for="TaskUserId"><?php echo __('User'); ?></label>
						<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						<?php
						$attributes = array(
							'tabindex' => '1',
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
						<label class="control-label" for="TaskPackId"><?php echo __('Pack'); ?></label>
						<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						<?php
						$attributes = array(
							'tabindex' => '2',						
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
						<label class="control-label" for="TaskNumber"><?php echo __('Number'); ?></label>
						<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						<?php
						$attributes = array(
							'tabindex' => '3',
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
						<label class="control-label" for="TaskTitle"><?php echo __('Title'); ?></label>
						<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						<?php
						$attributes = array(
							'tabindex' => '4',
							'label' => false, 
							'class' => 'form-control',
							'placeholder' => __('Insert the title',false)
						);
						echo $this->Form->input('title',$attributes); 
						?>
					</div>
					
					<div class="form-group">
						<label class="control-label" for="TaskDescription"><?php echo __('Description'); ?></label>
						<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						<?php
						$attributes = array(
							'tabindex' => '5',						
							'type'=>'textarea',
							'label' => false, 
							'class' => 'form-control',
							'placeholder' => __('Insert the description',false)
						);
						echo $this->Form->input('description',$attributes); 
						?>
					</div>

					<div class="form-group">
						<label class="control-label" for="TaskRepeatType"><?php echo __('Repeat Type'); ?></label>
						<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						<?php					
						$options = array(
							'0' => __('None',false), 
							'D' => __('Daily',false),
							'2-6' => __('Every Weekday (Monday to Friday',false),
							'2,4,6' => __('Every Monday, Wednesday and Friday',false),
							'3,5' => __('Every Tuesday and Thursday',false),
							'W' => __('Weekly',false),							
							'M' => __('Monthly',false),
							'A' => __('Anual',false),							
						);
						$attributes = array(
							'tabindex' => '6',
							'label' => false, 
							'class' => 'form-control',
							'empty'=>__('---Select the repeat type---'),
							'type' => 'select',
							'options' => $options
						);
						echo $this->Form->input('repeat_type',$attributes); 
						?>
					</div>					
					
					<div class="form-group">						
						<div class="checkbox task-days-of-the-week">									
							<?php echo $this->Form->input('sunday',array('type'=>'checkbox', 'class' => 'form-control')); ?>
							<br>
							<?php echo $this->Form->input('monday',array('type'=>'checkbox', 'class' => 'form-control')); ?>
							<br>
							<?php echo $this->Form->input('tuesday',array('type'=>'checkbox', 'class' => 'form-control')); ?>
							<br>
							<?php echo $this->Form->input('wednesday',array('type'=>'checkbox', 'class' => 'form-control')); ?>
							<br>
							<?php echo $this->Form->input('thursday',array('type'=>'checkbox', 'class' => 'form-control')); ?>
							<br>
							<?php echo $this->Form->input('friday',array('type'=>'checkbox', 'class' => 'form-control')); ?>
							<br>
							<?php echo $this->Form->input('saturday',array('type'=>'checkbox', 'class' => 'form-control')); ?>
							<br>
						</div>
					</div>
					
					<div class="form-group task-start-date">
						<label class="control-label" for="TaskStartDate"><?php echo __('Start Date'); ?></label>
						<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
						<?php
						$attributes = array(
							'tabindex' => '7',
							'label' => false, 
							'class' => 'form-control datepicker',
							'placeholder' => __('Insert the date',false),
							'type' => 'text'
						);
						echo $this->Form->input('start_date',$attributes); 
						?>
					</div>

					<div class="form-group task-time">
						<label class="control-label" for="TaskTime"><?php echo __('Time'); ?></label>
						<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
						<?php
						$attributes = array(
							'tabindex' => '8',
							'label' => false, 
							'class' => 'form-control timepicker',
							'placeholder' => __('Insert the time',false),
							'type' => 'text'
						);
                        if ($this->params['action'] == 'add')
                        {
                            $attributes['value'] = '0:00';
                        }
						echo $this->Form->input('time',$attributes); 
						?>
					</div>					
					
					<div class="form-group task-end-date">
						<label class="control-label" for="TaskEndDate"><?php echo __('End Date'); ?></label>
						<?php
						$attributes = array(
							'tabindex' => '10',
							'label' => false, 
							'class' => 'form-control datepicker',
							'placeholder' => __('Insert the end date',false),
							'type' => 'text'
						);
						echo $this->Form->input('end_date',$attributes); 
						?>
					</div>	
					
					<div class="form-group">
						<label class="control-label" for="TaskWithWhom"><?php echo __('With Whom'); ?></label>
						<?php
						$attributes = array(
							'tabindex' => '11',
							'type'=>'textarea',
							'label' => false, 
							'class' => 'form-control',
							'placeholder' => __('Insert the participants',false)
						);
						echo $this->Form->input('with_whom',$attributes); 
						?>
					</div>					

					<div class="form-group">
						<label class="control-label" for="TaskObstacles"><?php echo __('Obstacles'); ?></label>
						<?php
						$attributes = array(
							'tabindex' => '12',
							'type'=>'textarea',
							'label' => false, 
							'class' => 'form-control',
							'placeholder' => __('Insert the possible obstacles',false)
						);
						echo $this->Form->input('obstacles',$attributes); 
						?>
					</div>

					<div class="form-group">
						<label class="control-label" for="TaskBenefits"><?php echo __('Benefits'); ?></label>
						<?php
						$attributes = array(
							'tabindex' => '13',
							'type'=>'textarea',
							'label' => false, 
							'class' => 'form-control',
							'placeholder' => __('Insert the benefits',false)
						);
						echo $this->Form->input('benefits',$attributes); 
						?>
					</div>

					<div class="form-group">
						<label class="control-label" for="TaskReminders"><?php echo __('Reminders'); ?></label>
						<?php
							$attributes = array(
							'tabindex' => '14',
							'type'=>'textarea',
							'label' => false, 
							'class' => 'form-control',
							'placeholder' => __('Insert the reminders',false)
						);
						echo $this->Form->input('reminders',$attributes); 
						?>
					</div>

					<div class="form-group">
						<label class="control-label" for="TaskPunishments"><?php echo __('Punishments'); ?></label>
						<?php
							$attributes = array(
							'tabindex' => '15',
							'type'=>'textarea',
							'label' => false, 
							'class' => 'form-control',
							'placeholder' => __('Insert the punishments',false)
						);
						echo $this->Form->input('punishments',$attributes); 
						?>
					</div>

					<div class="form-group">
						<label class="control-label" for="TaskCelebrations"><?php echo __('Celebrations'); ?></label>
						<?php
							$attributes = array(
							'tabindex' => '16',
							'type'=>'textarea',
							'label' => false, 
							'class' => 'form-control',
							'placeholder' => __('Insert the celebrations',false)
						);
						echo $this->Form->input('celebrations',$attributes); 
						?>
					</div>

					<div class="form-group">
						<label class="control-label" for="TaskNotes"><?php echo __('Notes'); ?></label>
						<?php
							$attributes = array(
							'tabindex' => '17',
							'type'=>'textarea',
							'label' => false, 
							'class' => 'form-control',
							'placeholder' => __('Insert the notes',false)
						);
						echo $this->Form->input('notes',$attributes); 
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
<?php echo $this->Html->script('task-form.js', array('block' => 'scriptBottom')); ?>