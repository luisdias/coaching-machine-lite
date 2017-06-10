$( document ).ready(function() {
	
	// focus on the first form field 
	if ( $('#PaymentUserId').is(':disabled')) {
		$('#PaymentNumber').focus();
	} else {
		$('#PaymentUserId').focus();
	}
});