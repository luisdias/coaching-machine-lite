/* rootUrl - default.ctp */
$(document).ready(function () {
	$("#label_sets").bind("change", function (event) {
		if (this.value) 
		{ 
			window.location.href = rootUrl + 'ConfigLabelSets?lsid='+this.value;
		} 
		else 
		{ 
			window.location.href = rootUrl + 'ConfigLabelSets';
		}	
	});

	$("#labels").bind("change", function (event) {
		if (this.value)
		{ 
			window.location.href = rootUrl + 'ConfigLabelSets?lsid='+document.getElementById('label_sets').value+
			'&lid='+this.value;
		}
		else 
		{ 
			window.location.href = rootUrl + 'ConfigLabelSets?lsid='+document.getElementById('label_sets').value;
		}			
	});
	
});	