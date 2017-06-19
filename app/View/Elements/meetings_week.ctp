<div class="panel panel-success">
    <div class="panel-heading"><h3><?php echo __('Meetings Next 5 Days'); ?></h3></div>
    <div class="panel-body">
<?php if (!empty($meetings_week)) { ?>
        <section id="no-more-tables">
        <table class="table table-bordered table-striped table-condensed cf">
        <thead class="cf">
        <tr>
            <th><?php echo __('Coachee'); ?></th>        
            <th><?php echo __('Number'); ?></th>
            <th><?php echo __('Date'); ?></th>
            <th><?php echo __('Day'); ?></th>
            <th><?php echo __('Time'); ?></th>
            <th><?php echo __('Action'); ?></th>
        </tr>
        </thead>    
        <?php
        $i = 0;
        foreach ($meetings_week as $meeting):
            $class = null;
            if ($i++ % 2 == 0) {
                    $class = ' class="altrow"';
            }
        ?>
            <tr<?php echo $class;?>>
                <td data-title="<?php echo __('Name',false); ?>"><?php echo $meeting['User']['name'];?></td>            
                <td data-title="<?php echo __('Number',false); ?>"><?php echo $meeting['Meeting']['number'];?></td>                        
                <td data-title="<?php echo __('Date',false); ?>"><?php echo $meeting['Meeting']['date'];?></td>
                <td data-title="<?php echo __('Day',false); ?>"><?php echo $this->element('day-of-the-week',array('date' => $meeting['Meeting']['date'])); ?></td>
                <td data-title="<?php echo __('Time',false); ?>"><?php echo $meeting['Meeting']['time'];?></td>
                <td data-title="<?php echo __('Action',false); ?>"><?php echo $this->Html->link(__('Edit'), array('controller' => 'meetings', 'action' => 'edit', $meeting['Meeting']['id'])); ?></td>
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