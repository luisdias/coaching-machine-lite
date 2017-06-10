<div class="packs view">
	<div class="row"">
		<div class="col-sm-9">
			<div class="panel panel-default">
				<div class="panel-heading"><!--<a href="#" class="pull-right">View all</a>--> <h4><?php echo __('Pack') . ' : ' . $pack['Pack']['title']; ?></h4></div>
				<div class="panel-body">
					<h2><i class="glyphicon glyphicon-th-large pull-right"></i></h2>
					<div class="clearfix"></div>
					<hr>
					<dl>
						<dt><?php echo __('Id'); ?></dt>
						<dd>
							<?php echo h($pack['Pack']['id']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Status'); ?></dt>
						<dd>
							<?php echo h($pack['Pack']['status']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Title'); ?></dt>
						<dd>
							<?php echo h($pack['Pack']['title']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Description'); ?></dt>
						<dd>
							<?php echo h($pack['Pack']['description']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Number Of Sessions'); ?></dt>
						<dd>
							<?php echo h($pack['Pack']['number_of_meetings']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Session Price'); ?></dt>
						<dd>
							<?php echo h($pack['Pack']['meeting_price']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Start Date'); ?></dt>
						<dd>
							<?php echo h($pack['Pack']['start_date']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('End Date'); ?></dt>
						<dd>
							<?php echo h($pack['Pack']['end_date']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('User'); ?></dt>
						<dd>
							<?php echo $this->Html->link($pack['User']['name'], array('controller' => 'users', 'action' => 'view', $pack['User']['id'])); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Created'); ?></dt>
						<dd>
							<?php echo h($pack['Pack']['created']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Modified'); ?></dt>
						<dd>
							<?php echo h($pack['Pack']['modified']); ?>
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
					<li><?php echo $this->Html->link(__('Edit Pack'), array('action' => 'edit', $pack['Pack']['id'])); ?> </li>
					<li><?php echo $this->Form->postLink(__('Delete Pack'), array('action' => 'delete', $pack['Pack']['id']), array(), __('Are you sure you want to delete # %s?', $pack['Pack']['id'])); ?> </li>
					<li><?php echo $this->Html->link(__('List Packs'), array('action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('New Pack'), array('action' => 'add')); ?> </li>
				</ul>
			</div><!-- well -->
		</div><!-- col-sm-3 -->				
	</div><!-- row -->
</div><!-- meetings view -->

<div id="no-more-tables">
<?php //echo $this->element('related-enneagram-tests',array('currentModel'=>$pack)); ?>
<?php echo $this->element('related-payments',array('currentModel'=>$pack)); ?>
<?php echo $this->element('related-meetings',array('currentModel'=>$pack)); ?>
<?php echo $this->element('related-tasks',array('currentModel'=>$pack)); ?>
<?php echo $this->element('related-wheels',array('currentModel'=>$pack)); ?>
</div><!-- no-more-tables -->
