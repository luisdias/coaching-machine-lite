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
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<meta name="viewport" content="width=device-width, minimum-scale=.85, initial-scale=1.0, maximum-scale=1.0">
	<?php
		echo $this->Html->meta('icon');
		
		echo $this->Html->css('pickadate/themes/default');
		echo $this->Html->css('pickadate/themes/default.date');
		echo $this->Html->css('pickadate/themes/default.time');
		
		echo $this->Html->css('pick-a-color/pick-a-color-1.2.3.min');
		
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('table-responsive');		
		echo $this->Html->css('styles.css?' . rand()); ?>

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>

<body>
<div class="container">
    <div class="box">
        <div class="row row-offcanvas row-offcanvas-left">
			<?php 
			if ( $this->Session->read('Auth.User.role') == "Coach" ) {
				echo $this->element('sidebar-admin'); 
			} else {
				echo $this->element('sidebar-user'); 
			}				
			?>

            <!-- main right col -->
            <div class="column col-sm-10 col-xs-11" id="main">
                
				<?php 
				if ( $this->Session->read('Auth.User.role') == "Coach" ) {
					echo $this->element('top-navbar-admin'); 
				} else {
					echo $this->element('top-navbar-user'); 
				}				
				?>
                
				<div class="full col-md-12">
					<div class="row">
						<div class="col-sm-12">
							<?php echo $this->Session->flash(); ?>
							<?php echo $this->fetch('content'); ?>
						</div>
					</div>
				  
					<div class="row" id="footer">    
					  <div class="col-sm-12">
						<p>
						<a href="mailto:smartbyte.systems@gmail.com" class="pull-right">Coaching Machine ©Copyright 2015-<script>document.write(new Date().getFullYear())</script> Luís E. S. Dias</a>
						</p>							
					  </div>
					</div>
				    <?php echo $this->element('sql_dump'); ?>
				</div><!-- /col-md-12 -->
                
            </div><!-- /main -->
          
        </div>
    </div>
</div><!-- /container -->
<script type="text/javascript">
	rootUrl = "<?php echo Router::url('/'); ?>";
</script>
<!--post modal-->
<!-- script references -->
<?php echo $this->Html->script('jquery.js'); ?>
<?php echo $this->Html->script('bootstrap.min.js'); ?>
<?php echo $this->Html->script('scripts.js'); ?>

<?php echo $this->Html->script('pickadate/picker.js'); ?>
<?php echo $this->Html->script('pickadate/picker.date.js'); ?>
<?php echo $this->Html->script('pickadate/picker.time.js'); ?>
<?php echo $this->Html->script('pickadate/legacy.js'); ?>
<?php echo $this->Html->script('pickadate/translations/pt_BR.js'); ?>

<?php echo $this->Html->script('star-rating/bootstrap-star-rating.js'); ?>

<?php echo $this->fetch('scriptBottom'); ?>
</body>
</html>
< ?php echo $this->element('sql_dump'); ?>