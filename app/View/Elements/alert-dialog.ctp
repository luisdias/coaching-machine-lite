<div class="modal fade" id="<?php echo $alertDialogId; ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel"><?php echo $dialogTitle; ?></h4>
			</div>
		
			<div class="modal-body">
			<center><h3><?php echo $dialogText; ?></h3></center>
			</div>
			
			<div class="modal-footer">				
				<a id="<?php echo $okButtonId; ?>" class="btn btn-info btn-ok" data-action="">OK</a>
				<button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo __('Cancel'); ?></button>	
			</div>
		</div>
	</div>
</div>