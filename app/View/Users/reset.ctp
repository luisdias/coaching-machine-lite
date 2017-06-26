<?php echo $this->Form->create('User', array('class' => 'form-login')); ?>
<h2 class="form-reset-heading">Reset Password</h2>
<div class="login-wrap">
	<?php
	$attributes = array(
		'value' => '', 
		'label' => false, 
		'class' => 'form-control',
		'placeholder' => __('Insert the new password',false)
	);
	echo $this->Form->input('password',$attributes); 
	$attributes = array(
		'value' => '', 
		'type' => 'password', 
		'label' => false, 
		'class' => 'form-control',
		'placeholder' => __('Insert the password confirmation',false)
	);
	echo $this->Form->input('password_confirm',$attributes); 
	?>
	<br>
	<?php					
	echo $this->Form->button(__('Save'), array('type' => 'submit','class' => 'btn btn-primary btn-block')); 
	echo $this->Form->end();
	?>
	<hr>
	<br>
</div>

<?php
$code="
$( document ).ready(function() {	
	$('#authMessage').removeClass('message').addClass('alert alert-danger');
});
";
$this->Html->scriptBlock($code, array('block' => 'scriptBottom'));
?>