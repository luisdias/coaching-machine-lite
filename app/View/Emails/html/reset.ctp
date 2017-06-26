<p><?php echo __('Please click on the link below to reset your password.'); ?></p>
<a href="http://<?= $_SERVER['HTTP_HOST'].$this->webroot; ?>reset/<?= $key .'BXX'.$rand.'XXB'. $id ?>/">Click here to reset your account password</a>
<hr />
<p><?php echo __('Alternatively, you can also copy paste the below link into your browser:'); ?>
</p>
<p>http://<?= $_SERVER['HTTP_HOST'].$this->webroot; ?>reset/<?= $key .'BXX'.$rand.'XXB'. $id ?>/</p>
<p><?php echo __('This email was sent by Coaching Machine'); ?></p>