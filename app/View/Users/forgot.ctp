<?php echo $this->Form->create('User', array('class' => 'form-login')); ?>
<h2 class="form-reset-heading">Reset Password</h2>
<div class="login-wrap">
	<?php echo $this->Form->input('email', array(
					'class' => 'form-control',
					'placeholder'=>__('Email',true),
					'label'=>false,
					'required'=>true,
					'autofocus'=>true)
					); 
	?>
	<br>
	<?php					
	echo $this->Form->button(__('Reset'), array('type' => 'submit','class' => 'btn btn-primary btn-block')); 
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