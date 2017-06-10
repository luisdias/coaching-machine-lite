<?php 
	$day = date("w", strtotime($date));	
	switch ($day) {
		case 0:
			echo __('Sunday');
			break;
		case 1:
			echo __('Monday');
			break;
		case 2:
			echo __('Tuesday');
			break;
		case 3:
			echo __('Wednesday');
			break;
		case 4:
			echo __('Thursday');
			break;
		case 5:
			echo __('Friday');
			break;
		case 6:
			echo __('Saturday');
			break;
		default:
			echo '';
			break;			
	}
?>