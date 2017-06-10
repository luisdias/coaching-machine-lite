$(document).ready(function () {
		$("#WheelsEditForm").bind("submit", function (event) {
		$(".ajax-spinner").show();
            
        /*
        numera os campos das slices (sliders) e transforma os atributos informação concatenada por "_" para o metodo save do WheelsController poder tratar
        os atributos contem os dados 
        wheel_slice_id,
        value,
        config_wheel_id,
        config_wheel_slice_group_id e 
        config_wheel_slice_id
        */
            
            
		$form_elements = "";
		// at the begining, add work slice select box
		$form_elements += 'work_slice_id=' + $("#workSlice").val() + '&';            
		i = 1;
		$('#WheelsEditForm').find('input[type=text]').each(function () {
			
			$form_elements += 'slide_info_' + i + ' =' + $(this).attr( 'data-slice-id' ) + '_' +
			$(this).attr( 'value' ) + '_' + 
            $(this).attr( 'data-wheel-id' ) + '_' +
            $(this).attr( 'data-config-wheel-slice-group-id' ) + '_' +
            $(this).attr( 'data-config-wheel-slice-id' ) + '&';
			i++;
		});	

		//alert($form_elements);
		$.ajax({
		type: "POST",
		url: rootUrl + "wheels/save",
		dataType: 'text',
		data: $form_elements ,
		success: function(data, textStatus){			
			$(".ajax-spinner").hide();
			jQuery("#info-message").modal('show');			
		},
		error: function(msg) {         
			alert(2);
		}
		});
	});
});	