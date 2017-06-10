<?php 		
	/*
	parameters:
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
	*/
	
	$output = null;
	$sSun = __('Sun',true);
	$sMon = __('Mon',true);
	$sTue = __('Tue',true);
	$sWed = __('Wed',true);
	$sThu = __('Thu',true);
	$sFri = __('Fri',true);
	$sSat = __('Sat',true);

	if ( $repeat_type == '0') {
		echo $date . '<br>' . $time;
	}
	if ( $repeat_type == 'D') {
		$output = __('Everyday',true);
	}
	
	if ( $repeat_type == '2-6') {
		$output = 	$sSun . '&nbsp;' .
					'<span class="badge">' . $sMon . '</span>' . '&nbsp;' .
					'<span class="badge">' . $sTue . '</span>' . '&nbsp;' .
					'<span class="badge">' . $sWed . '</span>' . '&nbsp;' .
					'<span class="badge">' . $sThu . '</span>' . '&nbsp;' .
					'<span class="badge">' . $sFri . '</span>' . '&nbsp;' .
					$sSat;	

	}
	
	if ( $repeat_type == '2,4,6') {
		$output = 	$sSun . '&nbsp;' .
					'<span class="badge">' . $sMon . '</span>' . '&nbsp;' .
					$sTue . '&nbsp;' .
					'<span class="badge">' . $sWed . '</span>' . '&nbsp;' .
					$sThu . '&nbsp;' .
					'<span class="badge">' . $sFri . '</span>' . '&nbsp;' .
					$sSat;

	}
	
	if ( $repeat_type == '3,5') {
		$output = 	$sSun . '&nbsp;' .
					$sMon . '&nbsp;' .
					'<span class="badge">' . $sTue . '</span>' . '&nbsp;' .
					$sWed . '&nbsp;' .
					'<span class="badge">' . $sThu . '</span>' . '&nbsp;' .
					$sFri . '&nbsp;' .
					$sSat;

	}
	
	if ( $repeat_type == 'W') {
		$output = 	($sunday ? '<span class="badge">' . $sSun . '</span>' : $sSun ) . '&nbsp;' .
					($monday ? '<span class="badge">' . $sMon . '</span>' : $sMon ). '&nbsp;' .
					($tuesday ? '<span class="badge">' . $sTue . '</span>' : $sTue ). '&nbsp;' .
					($wednesday ? '<span class="badge">' . $sWed . '</span>' : $sWed ) . '&nbsp;' .
					($thursday ? '<span class="badge">' . $sThu . '</span>' : $sThu ). '&nbsp;' .
					($friday ? '<span class="badge">' . $sFri . '</span>' : $sFri ). '&nbsp;' .
					($saturday ? '<span class="badge">' . $sSat . '</span>' : $sSat );

	}
	
	if ( $repeat_type == 'M') {
		$output = __('Once a Month',true) . ' - ' . $day_of_the_month;

	}
	
	if ( $repeat_type == 'A') {
		$output = __('Once a Year',true);
	}
	
	echo $output;
	
?>