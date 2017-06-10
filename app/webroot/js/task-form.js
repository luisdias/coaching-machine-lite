$('#TaskDescription').prop('maxlength', '255');
$('#TaskWithWhom').prop('maxlength', '255');
$('#TaskObstacles').prop('maxlength', '255');
$('#TaskBenefits').prop('maxlength', '255');
$('#TaskReminders').prop('maxlength', '255');
$('#TaskPunishment').prop('maxlength', '255');
$('#TaskCelebration').prop('maxlength', '255');
$('#TaskNotes').prop('maxlength', '255');

/*
var options = {
	'maxCharacterSize': 140,
	'originalStyle': 'originalTextareaInfo',
	'warningStyle' : 'warningTextareaInfo',
	'warningNumber': 20,
	'displayFormat': '#left / #max'
};	
$('#TaskDescription').textareaCount(options);
$('#TaskWithWhom').textareaCount(options);
$('#TaskObstacles').textareaCount(options);
$('#TaskBenefits').textareaCount(options);
$('#TaskReminders').textareaCount(options);
$('#TaskPunishment').textareaCount(options);
$('#TaskCelebration').textareaCount(options);
$('#TaskNotes').textareaCount(options);
*/
$( document ).ready(function() {
	
	// focus on the first form field 
	if ( $('#TaskUserId').is(':disabled')) {
		$('#TaskNumber').focus();
	} else {
		$('#TaskUserId').focus();
	}
		
	$value = $('#TaskRepeatType').val();
	if ($value == "") {
		$('.task-days-of-the-week').hide();
	} else if ($value == "0") {
		$('.task-days-of-the-week').hide();
	} else if  ($value == "M") {
		$('.task-days-of-the-week').hide();
	} else if ($value == "A") {
		$('.task-days-of-the-week').hide();
	} else {
		$('.task-days-of-the-week').show();
	}
	if ($value != "W") {
		$('input:checkbox').click(function(){ return false; });
	}	
		
});

$('#TaskRepeatType').on('change', function(){
	var $this = $(this);
	$value = $this.val();
	if ($value == "0" || $value == "M" || $value == "A") {
		$('#TaskSunday').prop('checked', false);
		$('#TaskMonday').prop('checked', false);
		$('#TaskTuesday').prop('checked', false);
		$('#TaskWednesday').prop('checked', false);
		$('#TaskThursday').prop('checked', false);
		$('#TaskFriday').prop('checked', false);
		$('#TaskSaturday').prop('checked', false);

		$('.task-days-of-the-week').addClass('disabled');
		$('input:checkbox').click(function(){ return false; });	
		
		
		$('.task-days-of-the-week').hide();
	}			
	if ($value == "D") {
		$('#TaskSunday').prop('checked', true);
		$('#TaskMonday').prop('checked', true);
		$('#TaskTuesday').prop('checked', true);
		$('#TaskWednesday').prop('checked', true);
		$('#TaskThursday').prop('checked', true);
		$('#TaskFriday').prop('checked', true);
		$('#TaskSaturday').prop('checked', true);
		
		$('.task-days-of-the-week').addClass('disabled');
		$('input:checkbox').click(function(){ return false; });
		
		$('.task-days-of-the-week').show();
	}
	if ($value == "2-6") {
		$('#TaskSunday').prop('checked', false);
		$('#TaskMonday').prop('checked', true);
		$('#TaskTuesday').prop('checked', true);
		$('#TaskWednesday').prop('checked', true);
		$('#TaskThursday').prop('checked', true);
		$('#TaskFriday').prop('checked', true);
		$('#TaskSaturday').prop('checked', false);
		
		$('.task-days-of-the-week').addClass('disabled');
		$('input:checkbox').click(function(){ return false; });
		
		$('.task-days-of-the-week').show();
	}
	if ($value == "2,4,6") {
		$('#TaskSunday').prop('checked', false);
		$('#TaskMonday').prop('checked', true);
		$('#TaskTuesday').prop('checked', false);
		$('#TaskWednesday').prop('checked', true);
		$('#TaskThursday').prop('checked', false);
		$('#TaskFriday').prop('checked', true);
		$('#TaskSaturday').prop('checked', false);

		$('.task-days-of-the-week').addClass('disabled');				
		$('input:checkbox').click(function(){ return false; });
		
		$('.task-days-of-the-week').show();				
	}
	if ($value == "3,5") {
		$('#TaskSunday').prop('checked', false);
		$('#TaskMonday').prop('checked', false);
		$('#TaskTuesday').prop('checked', true);
		$('#TaskWednesday').prop('checked', false);
		$('#TaskThursday').prop('checked', true);
		$('#TaskFriday').prop('checked', false);
		$('#TaskSaturday').prop('checked', false);
		
		$('.task-days-of-the-week').addClass('disabled');
		$('input:checkbox').click(function(){ return false; });
		
		$('.task-days-of-the-week').show();
	}
	if ($value == "W") {
		$('#TaskSunday').prop('checked', false);
		$('#TaskMonday').prop('checked', false);
		$('#TaskTuesday').prop('checked', false);
		$('#TaskWednesday').prop('checked', false);
		$('#TaskThursday').prop('checked', false);
		$('#TaskFriday').prop('checked', false);
		$('#TaskSaturday').prop('checked', false);
		
		$('.task-days-of-the-week').removeClass('disabled');
		$('input:checkbox').unbind('click');
		
		$('.task-days-of-the-week').show();
	}/*			
	if ($value != "0") {
		$('.task-end-date').show();
		$('.task-date').hide();
		$('.task-time').hide();				
	} else {
		$('.task-end-date').hide();
		$('.task-date').show();
		$('.task-time').show();				
	}
	if ($value == "M") {
		$('.task-day-of-the-month').show();
	} else {
		$('.task-day-of-the-month').hide();
	}*/
});

