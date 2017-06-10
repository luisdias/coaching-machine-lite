<div class="meetings view">
	<div class="row"">
		<div class="col-sm-9">
			<div class="panel panel-default">
				<div class="panel-heading"><!--<a href="#" class="pull-right">View all</a>--> <h4><?php echo __('Meeting') . ' : ' . $meeting['Meeting']['date']; ?></h4></div>
				<div class="panel-body">
					<h2><i class="glyphicon glyphicon-folder-open pull-right"></i></h2>
					<div class="clearfix"></div>
					<hr>
					<dl>
						<dt><?php echo __('Id'); ?></dt>
						<dd>
							<?php echo h($meeting['Meeting']['id']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Date'); ?></dt>
						<dd>
							<?php echo h($meeting['Meeting']['date']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Summary'); ?></dt>
						<dd>
							<?php echo h($meeting['Meeting']['summary']); ?>
							&nbsp;
						</dd>

						<dt><?php echo __('Positive Points'); ?></dt>
						<dd>
							<?php echo h($meeting['Meeting']['positive_points']); ?>
							&nbsp;
						</dd>

						<dt><?php echo __('Points To Improve'); ?></dt>
						<dd>
							<?php echo h($meeting['Meeting']['points_to_improve']); ?>
							&nbsp;
						</dd>

						<dt><?php echo __('Notes'); ?></dt>
						<dd>
							<?php echo h($meeting['Meeting']['notes']); ?>
							&nbsp;
						</dd>						
						
						<dt><?php echo __('User'); ?></dt>
						<dd>
							<?php echo $this->Html->link($meeting['User']['name'], array('controller' => 'users', 'action' => 'view', $meeting['User']['id'])); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Pack'); ?></dt>
						<dd>
							<?php echo $this->Html->link($meeting['Pack']['title'], array('controller' => 'packs', 'action' => 'view', $meeting['Pack']['id'])); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Created'); ?></dt>
						<dd>
							<?php echo h($meeting['Meeting']['created']); ?>
							&nbsp;
						</dd>
						<dt><?php echo __('Modified'); ?></dt>
						<dd>
							<?php echo h($meeting['Meeting']['modified']); ?>
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
					<li><?php echo $this->Html->link(__('Edit Meeting'), array('action' => 'edit', $meeting['Meeting']['id'])); ?> </li>
					<li><?php echo $this->Form->postLink(__('Delete Meeting'), array('action' => 'delete', $meeting['Meeting']['id']), array(), __('Are you sure you want to delete # %s?', $meeting['Meeting']['id'])); ?> </li>
					<li><?php echo $this->Html->link(__('List Meetings'), array('action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('New Meeting'), array('action' => 'add')); ?> </li>
				</ul>				
			</div><!-- well -->
		</div><!-- col-sm-3 -->				
	</div><!-- row -->
</div><!-- meetings view -->