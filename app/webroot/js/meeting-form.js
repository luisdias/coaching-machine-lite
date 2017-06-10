$( document ).ready(function() {
	
	// focus on the first form field 
	if ( $('#MeetingUserId').is(':disabled')) {
		$('#MeetingNumber').focus();
	} else {
		$('#MeetingUserId').focus();
	}
});