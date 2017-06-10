$( document ).ready(function() {
	
	// focus on the first form field 
	if ( $('#PackUserId').is(':disabled')) {
		$('#PackStatus').focus();
	} else {
		$('#PackUserId').focus();
	}
	
});