<div class="row">
    <ul class="breadcrumb">
        <li><?php echo $this->Html->link(__('Configuration'), array('controller' => 'pages', 'action' => 'config')); ?></li>
        <li><?php echo $this->Html->link(__('Defaults'), array('controller' => 'ConfigDefaults', 'action' => 'index')); ?></li>
    </ul>
</div>
<div class="configWheels index">
	<div class="row">
	<div class="col-md-12">	
	<h2><?php echo __('System Defaults'); ?></h2>
	<div id="no-more-tables">
		<table class="table table-hover table-condensed cf">
			<thead class="cf">				
				<tr>
					<th><?php echo $this->Paginator->sort('title',__('Country',true)); ?></th>
					<th><?php echo $this->Paginator->sort('title',__('Language',true)); ?></th>
					<th><?php echo $this->Paginator->sort('title',__('Currency',true)); ?></th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($configdefaults as $configDefault): ?>
				<tr>
					<td data-title="<?php echo __('Country',false); ?>"><?php echo h($configDefault['ConfigDefault']['default_country']); ?>&nbsp;</td>
					<td data-title="<?php echo __('Language',false); ?>"><?php echo h($configDefault['ConfigDefault']['default_language']); ?>&nbsp;</td>					
					<td data-title="<?php echo __('Currency',false); ?>"><?php echo h($configDefault['ConfigDefault']['default_currency']); ?>&nbsp;</td>					
					<td data-title="<?php echo __('Actions',false); ?>">
						<div class="btn-group">
							<button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
								<?php echo __('Select'); ?> <span class="caret"></span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $configDefault['ConfigDefault']['id'])); ?></li>
							</ul>
						</div>							
					</td>					
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	</div>
	</div>
</div>