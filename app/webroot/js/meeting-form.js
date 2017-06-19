$( document ).ready(function() {
	
	// focus on the first form field 
	if ( $('#MeetingUserId').is(':disabled')) {
		$('#MeetingNumber').focus();
	} else {
		$('#MeetingUserId').focus();
	}
	se = $('#MeetingSelfEvaluation').val();
	if (se != 0) {
		$('#self-evaluation').attr('data-rating',se);
	}
	$('#self-evaluation').rating();
});