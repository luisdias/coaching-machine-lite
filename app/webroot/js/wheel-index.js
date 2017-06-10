/* rootUrl - default.ctp */
$(document).ready(function () {
	$("#wheels").bind("change", function (event) {
		if (this.value) 
		{ 
			window.location.href = rootUrl + 'ConfigWheels?wid='+this.value;
		} 
		else 
		{ 
			window.location.href = rootUrl + 'ConfigWheels';
		}	
	});
	
	$("#slice_groups").bind("change", function (event) {
		if (this.value)
		{ 
			window.location.href = rootUrl + 'ConfigWheels?wid='+document.getElementById('wheels').value+
			'&gid='+this.value;
		}
		else 
		{ 
			window.location.href = rootUrl + 'ConfigWheels?wid='+document.getElementById('wheels').value;
		}			
	});
	
	$("#slices").bind("change", function (event) {
		if (this.value)
		{ 
			window.location.href = rootUrl + 'ConfigWheels?wid='+document.getElementById('wheels').value+
			'&gid='+document.getElementById('slice_groups').value+
			'&sid='+this.value;
		}
		else 
		{ 
			window.location.href = rootUrl + 'ConfigWheels?wid='+document.getElementById('wheels').value+
			'&gid='+document.getElementById('slice_groups').value; 
		}			
	});	
    
    /* LDIAS activate-button from the alert-dialog.ctp Element */
	$('#activate-wheel-button').on('click', function(e) {
		$.ajax({
		type: "POST",
		url: rootUrl + "ConfigWheels/activateWheel",
		dataType: 'text',
		data: 'wheel_id=' + wheel_id ,
		success: function(data, textStatus){			
			window.location.href = rootUrl + 'ConfigWheels';
		},
		error: function(msg) {         
			$('#activate-wheel-dialog button.btn.btn-danger').click(); /* hide the modal dialog */
            jQuery("#info-message").modal('show');
		}
		});			
		
	});	    
	
});	