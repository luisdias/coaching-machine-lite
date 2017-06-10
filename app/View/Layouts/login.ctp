<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'The Coaching Machine:: Version Beta 1.0');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('styles');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>

<body>
<div class="container">
	<?php echo $this->Session->flash(); ?>
	<?php echo $this->Session->flash('auth'); ?>
	<?php echo $content_for_layout; ?>	
</div><!-- /container -->

<!--post modal-->
<!-- script references -->
<?php echo $this->Html->script('jquery.js'); ?>
<?php echo $this->Html->script('backstretch/jquery.backstretch.min.js'); ?>
<?php echo $this->Html->script('bootstrap.min.js'); ?>
<script>
	$.backstretch(<?php echo "'" . $this->webroot . "'"; ?>  + 'img/computer-820277_1280.jpg', {speed: 500});
</script>
<?php echo $this->fetch('scriptBottom'); ?>
</body>
</html>
<?php echo $this->element('sql_dump'); ?>