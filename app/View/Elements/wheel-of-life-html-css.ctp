<?php

    // cria os estilos css necessarios 
    // verifica se toda a informacao de utilizador esta nula - neste caso e apenas um teste
    $hasUserData = true;
	$i = 1;
	reset($configWheel);	
	echo '<style>'."\n";
	foreach ($configWheel as $wheelSlice):
        if (is_null($wheelSlice['u']['id']) || empty($wheelSlice['u']['id'])) {
            $hasUserData = false;
        }
		echo '#ex' . $i . 'Slider .slider-handle {background: #' . $wheelSlice['s']['color'] . ';}';
		echo "\n";
		$i++;
	endforeach;
	
	echo '</style>'."\n"."\n";

    // LDIAS 
    // ERROR: It is not a test (has wheel_id) and there is no user data
    // ERROR: $configWheel is empty from controller
    if ((!is_null($wheel_id) && !$hasUserData)  || ( empty($configWheel)) ){        
        echo $this->element('alert-danger',array('message'=>__('ERROR: User data not created. Delete and recreate Wheel')));
        echo $this->Html->link(__('Go Back'), $referer,array('class' => 'btn btn-primary'));
        return true;        
    }

	echo '<div class="row">'."\n";
	echo '<h1>'.$wheel_title.'</h1>'."\n";
	echo '</div>'."\n";
	
	echo '<div class="row">'."\n";
	echo '<div class="col-md-8">'."\n";
	echo '<canvas id="myChart"></canvas>'."\n";

	/* work slice */
	echo '<br>'."\n";
	echo '<h3>' . __('Work Slice') . '</h3>';
	$i = 1;	
	reset($configWheel);
	$group = "";
	echo '<select name="workSlice" id="workSlice" required class="form-control">';
	echo '<option>'.__('---Select the Work Slice---').'</option>';
	foreach ($configWheel as $wheelSlice):	
		if ( $group != $wheelSlice['g']['group'] ) {
			if ($i > 1) {
				echo '</optgroup>';
			}
			echo '<optgroup label="'.$wheelSlice['g']['group'].'">';
			$group = $wheelSlice['g']['group'];
		}
		echo '<option value="'.$wheelSlice['s']['config_wheel_slice_id'].'"';
		if ( $wheelSlice['u']['work'] == 1 ) {
			echo ' selected ';
		}
		echo '>'."\n";
		echo $wheelSlice['s']['title']."\n";
		echo '</option>'."\n";
		$i++;
	endforeach;
	echo '</optgroup>';
	echo '</select>';	
			
	echo '</div>'."\n";	
	
	echo '<div class="col-md-4">'."\n";	
	
	echo $this->Form->create("Wheels", array("default" => false));
	
	$i = 1;	
	reset($configWheel);
	$group = "";
	foreach ($configWheel as $wheelSlice):	
		if ( $group != $wheelSlice['g']['group'] ) {
			echo '<h3>' . $wheelSlice['g']['group'] . '</h3>'."\n";
			$group = $wheelSlice['g']['group'];
		}
		echo '<div class="row">'."\n";
		echo '<div class="col-md-12">'."\n";
		echo '<h5>'. $wheelSlice['s']['title'] .'</h5>'."\n";
		echo '<input id="ex'. $i .'" data-slider-id="ex'. $i .'Slider" type="text" 
			data-slice-id="'.(is_null($wheelSlice['u']['id']) ? 0 : $wheelSlice['u']['id']).'" 
            data-wheel-id="'.(is_null($wheel_id) ? 0 : $wheel_id).'" 
            data-config-wheel-slice-group-id="'.(is_null($wheelSlice['g']['config_wheel_slice_group_id']) ? 0 : $wheelSlice['g']['config_wheel_slice_group_id']).'" 
            data-config-wheel-slice-id="'.(is_null($wheelSlice['s']['config_wheel_slice_id']) ? 0 : $wheelSlice['s']['config_wheel_slice_id']).'" 
			data-slider-min="0" 
			data-slider-max="100" 
			data-slider-step="10" 
			data-slider-value="'. (is_null($wheelSlice['u']['value']) ? 100 : $wheelSlice['u']['value'])  .'"/>'."\n";
		echo '&nbsp;&nbsp;<span class="badge" id="ex'. $i .'SliderVal">'. (is_null($wheelSlice['u']['value']) ? 100 : $wheelSlice['u']['value']) .'</span></span>';
		echo '</div>'."\n";
		echo '</div>'."\n";
		$i++;
	endforeach;	
	
	echo '</div>'."\n";
	echo '</div>'."\n";	
	
	echo '<div class="row">'."\n";			
	echo '<div class="ajax-spinner">'.$this->Html->image('ajax-spinner.gif').'</div>';
	echo '</div>'."\n";			

	echo '<div class="row">'."\n";		
	echo '<br>'."\n";

	echo '<div class="col-sm-12 col-md-6">';
    if (is_null($wheel_id)) {
	   echo $this->Form->button(__('Test',false), array('type' => 'button','class' => 'btn btn-primary btn-lg btn-block')); 
    } else {
       echo $this->Form->button(__('Save',false), array('type' => 'submit','class' => 'btn btn-primary btn-lg btn-block'));
    }
    echo $this->Form->end();        
	echo '</div>';

	echo '<div class="col-sm-12 col-md-6">';
    echo $this->Html->link(__('Cancel'), $referer,array('class' => 'btn btn-danger btn-lg btn-block'));
	echo '</div>';

	echo '</div>'."\n";	
	echo $this->element('alert-message',array(
        'infoTitle' => __('Message'),
        'infoText' => __('Wheel sucessfully updated')
    ));	
?>