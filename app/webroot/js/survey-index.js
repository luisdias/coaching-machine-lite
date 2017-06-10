/* rootUrl - default.ctp */
$(document).ready(function () {
	$("#surveys").bind("change", function (event) {
		if (this.value) 
		{ 
			window.location.href = rootUrl + 'ConfigSurveys?sid='+this.value;
		} 
		else 
		{ 
			window.location.href = rootUrl + 'ConfigSurveys';
		}	
	});
	
	$("#question_groups").bind("change", function (event) {
		if (this.value)
		{ 
			window.location.href = rootUrl + 'ConfigSurveys?sid='+document.getElementById('surveys').value+
			'&gid='+this.value;
		}
		else 
		{ 
			window.location.href = rootUrl + 'ConfigSurveys?sid='+document.getElementById('surveys').value;
		}			
	});
	
	$("#questions").bind("change", function (event) {
		if (this.value)
		{ 
			window.location.href = rootUrl + 'ConfigSurveys?sid='+document.getElementById('surveys').value+
			'&gid='+document.getElementById('question_groups').value+
			'&qid='+this.value;
		}
		else 
		{ 
			window.location.href = rootUrl + 'ConfigSurveys?sid='+document.getElementById('surveys').value+
			'&gid='+document.getElementById('question_groups').value; 
		}			
	});
	
	$("#answers").bind("change", function (event) {
		if (this.value)
		{ 
			window.location.href = rootUrl + 'ConfigSurveys?sid='+document.getElementById('surveys').value+
			'&gid='+document.getElementById('question_groups').value+
			'&qid='+document.getElementById('questions').value+
			'&aid='+this.value;
		}
		else 
		{ 
			window.location.href = rootUrl + 'ConfigSurveys?sid='+document.getElementById('surveys').value+
			'&gid='+document.getElementById('question_groups').value+
			'&qid='+document.getElementById('questions').value;	
		}			
	});	
	
	$("#applyLabels").bind("click", function (event) {	
		label_set = document.getElementById('label_sets').value;
		if (!label_set) {
			return false;
		}
		
		target = document.getElementById('label_set_target').value;
		if ( !target ) {
			return false;
		}
		
		survey = document.getElementById('surveys').value;
		if (target=="S" && !survey) {
			return false;
		}
		
		group = document.getElementById('question_groups').value;
		if (target=="G" && !group) {
			return false;
		}
		
		question = document.getElementById('questions').value;
		if (target=="Q" && !question) {
			return false;
		}		
		
		queryString = '&lsid='+label_set+'&tid='+target;
		$(this).attr('href', $(this).attr('href').concat(queryString));
		
		return true;
	});		
	
	$("#label_sets").bind("change", function (event) {
		label_set = this.value;
		label_set_target = document.getElementById('label_set_target').value;
		$().testLabels(label_set_target,label_set);
	});
	
	
	$("#label_set_target").bind("change", function (event) {
		label_set_target = this.value;
		label_set = document.getElementById('label_sets').value;
		$().testLabels(label_set_target,label_set);
	});

	/* custom function to test label_set_target and label_set */
	$.fn.testLabels = function (target, set) {
		if (target && set) {
			if (target == "S") {
				survey = document.getElementById('surveys').value;
				if (survey) {
					$( "#applyLabels" ).removeClass( "disabled" );
				} else {
					if ( !$("#applyLabels").hasClass("disabled") ) {
						$("#applyLabels").addClass( "disabled" );
					}
				}
			}
			if (target == "G") {
				question_group = document.getElementById('question_groups').value;
				if (question_group) {
					$( "#applyLabels" ).removeClass( "disabled" );
				} else {
					if ( !$("#applyLabels").hasClass("disabled") ) {
						$("#applyLabels").addClass( "disabled" );
					}
				}				
			}
			if (target == "Q") {
				question = document.getElementById('questions').value;
				if (question) {
					$( "#applyLabels" ).removeClass( "disabled" );
				} else {
					if ( !$("#applyLabels").hasClass("disabled") ) {
						$("#applyLabels").addClass( "disabled" );
					}
				}				
			}
		} else {
			if ( !$("#applyLabels").hasClass("disabled") ) {
				$("#applyLabels").addClass( "disabled" );
			}
		}
	};	

    /* LDIAS activate-button from the alert-dialog.ctp Element */
	$('#activate-survey-button').on('click', function(e) {
		$.ajax({
		type: "POST",
		url: rootUrl + "ConfigSurveys/activateSurvey",
		dataType: 'text',
		data: 'survey_id=' + survey_id ,
		success: function(data, textStatus){			
			window.location.href = rootUrl + 'ConfigSurveys';
		},
		error: function(msg) {         
			alert('Ocorreu um erro - contacte administrador');
		}
		});			
		
	});	
    
    
    /* LDIAS - btn-copy click sets the action for copy-survey-button */
    $(".btn-copy").on("click", function () {
        var action = $(this).attr('data-action');
        $("#copy-survey-button").attr('data-action',action);      
    });


    /* LDIAS activate-button from the alert-dialog.ctp Element */
	$('#copy-survey-button').on('click', function(e) {
        var url = $(this).attr('data-action');
        window.location.href = url;		
	});	    
    
});	