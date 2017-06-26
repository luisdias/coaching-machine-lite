<?php echo $this->Form->create('User', array('class' => 'form-login')); ?>
<h2 class="form-login-heading">Login</h2>
<div class="login-wrap">
	<?php echo $this->Form->input('username', array(
					'class' => 'form-control',
					'placeholder'=>__('Username',true),
					'label'=>false,
					'required'=>true,
					'autofocus'=>true)
					); 
	?>
	<br>
	<?php echo $this->Form->input('password',array(
				'class' => 'form-control',	
				'placeholder'=>__('Password',true),
				'label'=>false)
				); 
	?>
	<br>
	<?php					
	echo $this->Form->button(__('Sign in'), array('type' => 'submit','class' => 'btn btn-primary btn-block')); 
	echo $this->Form->end();
	?>
	<hr>
	<span class="pull-right">
	<?php echo $this->Html->link(__('Forget your password?'), array('controller' => 'Users', 'action' => 'forgot')); ?>
	</span>
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