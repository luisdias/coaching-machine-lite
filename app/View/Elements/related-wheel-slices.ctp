<div class="related">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading"><h4><?php echo __('Related Wheel Slices'); ?></h4></div>
				<?php if (!empty($currentModel['WheelSlice'])): ?>
				<table class="table table-hover table-condensed cf">
				<thead class="cf">
				<tr>
					<th><?php echo __('Group'); ?></th>
					<th><?php echo __('Title'); ?></th>
					<th width="15"></th>
					<th><?php echo __('Value'); ?></th>
					
				</tr>
				<?php foreach ($currentModel['WheelSlice'] as $wheelSlice): ?>
				<tr>
					<td data-title="<?php echo __('Group',false); ?>"><?php echo $wheelSlice['group']; ?></td>
					<td data-title="<?php echo __('Title',false); ?>"><?php echo $wheelSlice['title']; ?></td>
					<td data-title="<?php echo __('Work',false); ?>">
						<?php 
						if ( $wheelSlice['work'] == 1 ) {
							echo '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
						}
						?>
					</td>
					<td data-title="<?php echo __('Value',false); ?>">	

						<div class="progress">
							<div class="progress-bar" 
							role="progressbar" 
							aria-valuenow="60" 
							aria-valuemin="0" 
							aria-valuemax="100" 
							style="width: <?php echo $wheelSlice['value']; ?>%; min-width: 1.4em;?>;">
							<?php echo $wheelSlice['value']; ?>%
							</div>					
					  </div>
					</td>					
					
				</tr>
				<?php endforeach; ?>
				</table>
			<?php endif; ?>
			</div>
		</div>
	</div>
</div>	