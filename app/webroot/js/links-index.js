/* rootUrl - default.ctp */
function processCoacheeUrl(id)
{
	//alert(id);
	$.ajax({
	type: "POST",
	url: rootUrl + "links/setstatus",
	dataType: 'text',
	data: 'link_id=' + id ,
	success: function(data, textStatus){
		//window.location.href = rootUrl + "links";
	},
	error: function(msg) {         
		alert('Ocorreu um erro - contacte administrador');
	}
	});	
}