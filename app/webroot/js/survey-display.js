$('#SurveyDisplayForm').submit(function(event){
	//event.preventDefault();

	if ( validation() )
	{
		$('#saveButton').addClass('disabled');
		$(".ajax-spinner").show();		
		$('#SurveyDisplayForm').submit();
	}
});

$('#fakeButton').click(function(){
	if ( validation() )
	{

	}
});

function validation()
{
	lOk = true;
	$('.textarea-container.mandatory').each(function(){ 
		var t = $(this).find('textarea');	
		if ($.trim(t.val())==0) {
			$(this).next('.validation').show();
			lOk = false;
		}
		else
		{
			$(this).next('.validation').hide();
		};
	});
	
	
	$('.radio-container.mandatory').each(function(){ 	
		var r = $(this).find(':radio');
		checked = false;
		r.each(function(){
			if ( $(this).is(':checked') ) 
			{
				checked = true;
			}
		});
		if (!checked) {
			$(this).next('.validation').show();
			lOk = false;
		}
		else
		{
			$(this).next('.validation').hide();	
		}
	});
	
	$('.checkbox-container.mandatory').each(function(){ 	
		var c = $(this).find(':checkbox');
		checked = false;
		c.each(function(){
			if ( $(this).is(':checked') ) 
			{
				checked = true;
			}
		});
		if (!checked) {
			$(this).next('.validation').show();
			lOk = false;
		}
		else
		{
			$(this).next('.validation').hide();	
		}
	});
	
	$('.select-container.mandatory').each(function(){ 
		var s = $(this).find('select');	
		if (s.val()=="") {
			$(this).next('.validation').show();
			lOk = false;			
		}
		else
		{
			$(this).next('.validation').hide();
		};
	});
	return lOk;
}