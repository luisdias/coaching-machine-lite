<?php
if ( (is_null($users) || empty($users)) && $this->params['action'] == 'find' )
{
	 echo $this->element('alert-danger',array('message'=>__('No results')));
     echo $this->Html->link(__('Go Back'), array('action' => 'index'),array('class' => 'btn btn-primary'));
}
?>
<div class="users index">
	<div class="full col-sm-12">
		<?php 
		$i = 3;
		$openRow = true;
		foreach ($users as $user): 
		?>
			<?php if ( $i == 3 ) { echo '<div class="row">'; $i=0; $openRow = true;}; ?>
				<div class="col-sm-4">
					<!-- WHITE PANEL - TOP USER -->
					<div class="panel <?php if ( $user['User']['role'] == 'Coach' ) { echo 'panel-primary';} else { echo 'panel-info' ;}; ?>  pn">
						<div class="panel-heading">
						<?php if ( $user['User']['role'] == 'Coachee' ) { 
							echo $this->Html->link(__('Select'), array('action' => 'select', $user['User']['id']),array('class'=>'pull-right')); 
						}; ?>						
						<h4><?php echo h($user['User']['name']); ?></h4></div>
						<p>
						<?php 
							if (empty($user['User']['photo'])) {
								if ($user['User']['sex'] == "M") 
								{
									echo $this->Html->image('john-doe.png', array('alt' => $user['User']['name'], 'class' => 'img-circle img-responsive center-block'));
								}
								else if ($user['User']['sex'] == "F") 
								{
									echo $this->Html->image('jane-doe.png', array('alt' => $user['User']['name'], 'class' => 'img-circle img-responsive center-block'));
								}
								else
								{
									echo $this->Html->image('no-user.png', array('alt' => $user['User']['name'], 'class' => 'img-circle img-responsive center-block'));								
								}
							} else {
								echo $this->Html->image('/files/user/photo/'.$user['User']['id'].'/'.$user['User']['photo'], 
											array('alt' => $user['User']['name'], 
											'class' => 'img-circle img-responsive center-block'));
							}
						?>
						</p>
						<div class="row">						    
							<div class="col-md-6">
								<p class="small mt">
								<?php if ( $user['User']['role'] == 'Coachee' ) { 
                                    echo __('COACHEE SINCE'); 
                                } else {
                                    echo __('USING COACHING MACHINE SINCE'); 
                                }
                                ?>
								</p>								
							</div>
							<div class="col-md-6">
								<p><?php echo h($user['User']['created']);?></p>								
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="pull-right">
									<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?> | 
									<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
									<?php if ( $user['User']['role'] == 'Coachee' ) { ?>
									 | 
                                    <?php 
                                    echo $this->Html->link(
                                        __('Delete'), 
                                        '#', 
                                        array(
                                           'class'=>'btn-delete',
                                           'data-toggle'=> 'modal',
                                           'data-target' => '#confirm-delete-dialog',
                                           'data-action'=> Router::url(
                                              array('action'=>'delete',$user['User']['id'])
                                           ),
                                           'escape' => false), 
                                    false);
                                    ?>									 
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			
			<?php if ( $i == 3) { echo '</div><!-- /end row -->'; $openRow = false;}; ?>
			<?php $i++;?>
		<?php endforeach; ?>
		<?php if ($openRow) {echo '</div><!-- /end row -->';}?>
		<div class="row">
			<?php echo $this->element('pagination'); ?>
		</div>
    </div><!-- /full col-sm-12 -->
</div><!-- /users index -->
<?php echo $this->element('delete-dialog'); ?>
<?php echo $this->Html->script('delete-index.js', array('block' => 'scriptBottom')); ?>