<div class="payments view">
<div class="row"">
	<div class="col-sm-9">
		<div class="panel panel-default">
			<div class="panel-heading"><!--<a href="#" class="pull-right">View all</a>--> <h4><?php echo __('Payment'); ?></h4></div>
			<div class="panel-body">
				<h2><i class="glyphicon glyphicon-usd pull-right"></i></h2>		
				<div class="clearfix"></div>
				<hr>
				<dl>
					<dt><?php echo __('Id'); ?></dt>
					<dd><?php echo h($payment['Payment']['id']); ?></dd>
					<dt><?php echo __('User'); ?></dt>
					<dd><?php echo $this->Html->link($payment['User']['name'], array('controller' => 'users', 'action' => 'view', $payment['User']['id'])); ?></dd>
					<dt><?php echo __('Pack'); ?></dt>
					<dd><?php echo $this->Html->link($payment['Pack']['title'], array('controller' => 'packs', 'action' => 'view', $payment['Pack']['id'])); ?></dd>
					<dt><?php echo __('Due Amount'); ?></dt>
					<dd><?php echo h($payment['Payment']['due_amount']); ?></dd>
					<dt><?php echo __('Due Date'); ?></dt>
					<dd><?php echo h($payment['Payment']['due_date']); ?></dd>
					<dt><?php echo __('Payment Amount'); ?></dt>
					<dd>&nbsp;<?php echo h($payment['Payment']['payment_amount']); ?></dd>
					<dt><?php echo __('Payment Date'); ?></dt>
					<dd>&nbsp;<?php echo h($payment['Payment']['payment_date']); ?></dd>
					<dt><?php echo __('Created'); ?></dt>
					<dd><?php echo h($payment['Payment']['created']); ?></dd>
					<dt><?php echo __('Modified'); ?></dt>
					<dd><?php echo h($payment['Payment']['modified']); ?></dd>				
				<dl>
			</div>
		</div>
	</div>
	
	<div class="col-sm-3">
		<div class="well">
			<h3><?php echo __('Actions'); ?></h3>
			<ul class="list-unstyled">
				<li><?php echo $this->Html->link(__('Edit Payment'), array('action' => 'edit', $payment['Payment']['id'])); ?> </li>
				<li><?php echo $this->Form->postLink(__('Delete Payment'), array('action' => 'delete', $payment['Payment']['id']), array(), __('Are you sure you want to delete # %s?', $payment['Payment']['id'])); ?> </li>
				<li><?php echo $this->Html->link(__('List Payments'), array('action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New Payment'), array('action' => 'add')); ?> </li>
			</ul>		
		</div>		
	</div>
</div>
</div>
