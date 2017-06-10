<div class="modal fade" id="confirm-delete-dialog" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel"><?php echo __('Delete'); ?></h4>
			</div>
		
			<div class="modal-body">
			<center><h3><?php echo __('Are you sure you want to delete?'); ?></h3></center>
			</div>
			
			<div class="modal-footer">
            <?php 
            echo $this->Form->postLink(
            'OK',
            array('action' => 'delete'),
            array('class' => 'btn btn-info btn-ok', 'id'=>'delete-button'),
            false
            ); 
            ?>																							
			<button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo __('Cancel'); ?></button>	
			</div>
		</div>
	</div>
</div>