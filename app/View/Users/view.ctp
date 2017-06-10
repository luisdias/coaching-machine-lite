<div class="users view">
	<div class="row"">
		<div class="col-sm-9">
			<div class="panel panel-default">
				<div class="panel-heading"><!--<a href="#" class="pull-right">View all</a>--> <h4><?php echo h($user['User']['name']); ?></h4></div>
				<div class="panel-body">
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
						'class' => 'img-circle pull-right img-responsive'));
					}					
					?>					
					</p>
					<div class="clearfix"></div>
					<hr>

					<dl>
						<dt><?php echo __('Id'); ?></dt>
						<dd>
							<?php echo h($user['User']['id']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Role'); ?></dt>
						<dd>
							<?php echo h($user['User']['role']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Name'); ?></dt>
						<dd>
							<?php echo h($user['User']['name']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Sex'); ?></dt>
						<dd>
							<?php echo h($user['User']['sex']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Birthday'); ?></dt>
						<dd>
							<?php echo h($user['User']['birthday']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Occupation'); ?></dt>
						<dd>
							<?php echo h($user['User']['occupation']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Email'); ?></dt>
						<dd>
							<?php echo h($user['User']['email']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Username'); ?></dt>
						<dd>
							<?php echo h($user['User']['username']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Address'); ?></dt>
						<dd>
							<?php echo h($user['User']['address']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('City'); ?></dt>
						<dd>
							<?php echo h($user['User']['city']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('State'); ?></dt>
						<dd>
							<?php echo h($user['User']['state']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Country'); ?></dt>
						<dd>
							<?php echo h($user['User']['country']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Language'); ?></dt>
						<dd>
							<?php echo h($user['User']['language']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Currency'); ?></dt>
						<dd>
							<?php echo h($user['User']['currency']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Zip'); ?></dt>
						<dd>
							<?php echo h($user['User']['zip']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Phone'); ?></dt>
						<dd>
							<?php echo h($user['User']['phone']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Mobile'); ?></dt>
						<dd>
							<?php echo h($user['User']['mobile']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Skype'); ?></dt>
						<dd>
							<?php echo h($user['User']['skype']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Facebook'); ?></dt>
						<dd>
							<?php echo h($user['User']['facebook']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Linkedin'); ?></dt>
						<dd>
							<?php echo h($user['User']['linkedin']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Twitter'); ?></dt>
						<dd>
							<?php echo h($user['User']['twitter']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Site'); ?></dt>
						<dd>
							<?php echo h($user['User']['site']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Photo'); ?></dt>
						<dd>
							<?php echo h($user['User']['photo']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Created'); ?></dt>
						<dd>
							<?php echo h($user['User']['created']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Modified'); ?></dt>
						<dd>
							<?php echo h($user['User']['modified']); ?>
							&nbsp;
						</dd>
					</dl>
				</div><!-- panel-body -->
			</div><!-- panel panel-default -->
		</div><!-- col-sm-9 -->	

		<div class="col-sm-3">
			<div class="well">
				<h3><?php echo __('Actions'); ?></h3>
				<ul class="list-unstyled">		
					<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
					<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
					<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
				</ul>
			</div><!-- well -->
		</div><!-- col-sm-3 -->				
	</div><!-- row -->
</div><!-- meetings view -->

<div id="no-more-tables">
<?php echo $this->element('related-packs',array('currentModel'=>$user)); ?>
<?php echo $this->element('related-payments',array('currentModel'=>$user)); ?>
<?php echo $this->element('related-meetings',array('currentModel'=>$user)); ?>
<?php echo $this->element('related-tasks',array('currentModel'=>$user)); ?>
<?php echo $this->element('related-wheels',array('currentModel'=>$user)); ?>
</div><!-- no-more-tables -->