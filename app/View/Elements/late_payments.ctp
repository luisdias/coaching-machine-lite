<div class="panel panel-danger">
    <div class="panel-heading"><h3><?php echo __('Late Payments'); ?></h3></div>
    <div class="panel-body">
<?php if (!empty($late_payments)) { ?>
        <section id="no-more-tables">
        <table class="table table-bordered table-striped table-condensed cf">
        <thead class="cf">
        <tr>
            <th><?php echo __('Coachee'); ?></th>        
            <th><?php echo __('Number'); ?></th>
            <th><?php echo __('Due Amount'); ?></th>
            <th><?php echo __('Due Date'); ?></th>
            <th><?php echo __('Day'); ?></th>
            <th><?php echo __('Action'); ?></th>
        </tr>
        </thead>    
        <?php
        $i = 0;
        foreach ($late_payments as $payment):
            $class = null;
            if ($i++ % 2 == 0) {
                    $class = ' class="altrow"';
            }
        ?>
            <tr<?php echo $class;?>>
                <td data-title="<?php echo __('Name',false); ?>"><?php echo $payment['User']['name'];?></td>            
                <td data-title="<?php echo __('Number',false); ?>"><?php echo $payment['Payment']['number'];?></td>
                <td data-title="<?php echo __('Amount',false); ?>"><?php echo $payment['Payment']['due_amount'];?></td>
                <td data-title="<?php echo __('Date',false); ?>"><?php echo $payment['Payment']['due_date'];?></td>
                <td data-title="<?php echo __('Day',false); ?>"><?php echo $this->element('day-of-the-week',array('date' => $payment['Payment']['due_date'])); ?></td>
                <td data-title="<?php echo __('Action',false); ?>"><?php echo $this->Html->link(__('Edit'), array('controller' => 'payments', 'action' => 'edit', $payment['Payment']['id'])); ?></td>
            </tr>
        <?php endforeach; ?>
        </table>
        </section>    
<?php } else { ?>
    <h3><?php echo __('No results'); ?></h3>
<?php } ?>
    </div>
    <div class="panel-footer"></div>
</div>
