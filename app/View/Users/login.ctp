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
	<!--
	<hr>
	<span class="pull-right"><a href="#"><?php /* echo __('Forget your password?'); */ ?></a></span>
	<br>
	-->
</div>