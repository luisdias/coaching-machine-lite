<div class="meetings form">
	<div class="row">
		<div class="panel panel-default panel-primary">	
			<div class="panel-heading"><h3>
			<?php echo ( $this->params['action'] == 'add' ? __('Add Meeting') : __('Edit Meeting')); ?>
			</h3></div>
			<div class="panel-body">				  
				<?php echo $this->Form->create('Meeting', array('type' => 'file')); ?>
				<?php echo $this->Form->input('id'); ?>
				
				<div class="form-group">
					<label class="control-label" for="MeetingUserId"><?php echo __('User'); ?></label>
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
					<label class="control-label" for="MeetingPackId"><?php echo __('Pack'); ?></label>
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
					<label class="control-label" for="MeetingNumber"><?php echo __('Number'); ?></label>
					<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
					<?php
					$attributes = array('label' => false, 'class' => 'form-control','placeholder' => __('Insert the Number',false));
					if ($this->params['action'] == 'add' && isset($coachee_id) && isset($active_pack_id)) {
						$attributes['value'] = $next_number;
					}
					echo $this->Form->input('number',$attributes); 
					?>
				</div>
				
				<div class="form-group">
					<label class="control-label" for="MeetingDate"><?php echo __('Date'); ?></label>
					<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
					<?php
					$attributes = array(
						'label' => false, 
						'class' => 'form-control datepicker',
						'placeholder' => __('Insert the date',false),
						'type' => 'text'
					);
					echo $this->Form->input('date',$attributes); 
					?>
				</div>
				
				<div class="form-group task-time">
					<label class="control-label" for="MeetingTime"><?php echo __('Time'); ?></label>
					<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
					<?php
					$attributes = array(
						'label' => false, 
						'class' => 'form-control timepicker',
						'placeholder' => __('Insert the time',false),
						'type' => 'text'
					);
					echo $this->Form->input('time',$attributes); 
					?>
				</div>					
				
				<div class="form-group">
					<label class="control-label" for="MeetingSummary"><?php echo __('Summary'); ?></label>
					<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
					<?php
					$attributes = array('type'=>'textarea','rows' => '10', 'label' => false, 'class' => 'form-control','placeholder' => __('Insert the summary',false));
					echo $this->Form->input('summary',$attributes); 
					?>
				</div>

				<div class="form-group">
					<label class="control-label" for="MeetingPositivePoints"><?php echo __('Positive Points'); ?></label>
					<?php
					$attributes = array('type'=>'textarea', 'label' => false, 'class' => 'form-control','placeholder' => __('Insert the positive points (of my work as a coach)',false));
					echo $this->Form->input('positive_points',$attributes); 
					?>
				</div>

				<div class="form-group">
					<label class="control-label" for="MeetingPointsToImprove"><?php echo __('Points To Improve'); ?></label>
					<?php
					$attributes = array('type'=>'textarea', 'label' => false, 'class' => 'form-control','placeholder' => __('Insert the points to improve (of my work as a coach)',false));
					echo $this->Form->input('points_to_improve',$attributes); 
					?>
				</div>

				<div class="form-group">
					<label class="control-label" for="MeetingNotes"><?php echo __('Notes'); ?></label>
					<?php
					$attributes = array('type'=>'textarea', 'label' => false, 'class' => 'form-control','placeholder' => __('Insert the notes',false));
					echo $this->Form->input('notes',$attributes); 
					?>
				</div>				

				<div class="form-group">
					<label class="control-label" for="MeetingSelfEvaluation"><?php echo __('Self Evaluation'); ?></label>
					<div id="self-evaluation" data-rating="0">
					<?php
					$attributes = array('type'=>'hidden', 'label' => false, 'class' => 'form-control');
					echo $this->Form->input('self_evaluation',$attributes); 
					?>
					</div>
				</div>

				<div class="form-group">
				    <div class="col-sm-12 col-md-6">				
                        <?php
                        echo $this->Form->end();
                        echo $this->Form->button(__('Save',false), array('type' => 'submit','class' => 'btn btn-primary btn-lg btn-block mb5')); 
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
<?php echo $this->Html->script('meeting-form.js', array('block' => 'scriptBottom')); ?>