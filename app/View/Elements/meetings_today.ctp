<div class="panel panel-danger">
    <div class="panel-heading"><h3><?php echo __('Meetings Today'); ?> : 
    <?php echo date('Y-m-d'); ?>&nbsp;
    <?php echo $this->element('day-of-the-week',array('date' => date('Y-m-d'))); ?></h3></div>
    <div class="panel-body">
<?php if (!empty($meetings_today)) { ?>
        <section id="no-more-tables">
        <table class="table table-bordered table-striped table-condensed cf">
        <thead class="cf">
        <tr>            
            <th colspan="2"><?php echo __('Coachee'); ?></th>        
            <th><?php echo __('Number'); ?></th>
            <th><?php echo __('Time'); ?></th>
            <th><?php echo __('Action'); ?></th>
        </tr>
        </thead>    
        <?php
        $i = 0;
        foreach ($meetings_today as $meeting):
            $class = null;
            if ($i++ % 2 == 0) {
                    $class = ' class="altrow"';
            }
        ?>
            <tr<?php echo $class;?>>
                <td data-title="<?php echo __('Coachee',false); ?>">
                <?php
                if (empty($meeting['User']['photo'])) {
                    if ($meeting['User']['sex'] == "M") 
                    {
                        echo $this->Html->image('john-doe.png', array('alt' => $meeting['User']['name'], 'class' => 'img-circle img-responsive center-block'));
                    }
                    else if ($meeting['User']['sex'] == "F") 
                    {
                        echo $this->Html->image('jane-doe.png', array('alt' => $meeting['User']['name'], 'class' => 'img-circle img-responsive center-block'));
                    }
                    else
                    {
                        echo $this->Html->image('no-user.png', array('alt' => $meeting['User']['name'], 'class' => 'img-circle img-responsive center-block'));								
                    }
                } else {
                    echo $this->Html->image('/files/user/photo/'.$meeting['User']['id'].'/'.$meeting['User']['photo'], 
                                array('alt' => $meeting['User']['name'], 
                                'class' => 'img-circle img-responsive center-block'));
                }
                ?>
                </td>
                <td data-title="<?php echo __('Name',false); ?>"><?php echo $meeting['User']['name'];?></td>            
                <td data-title="<?php echo __('Number',false); ?>"><?php echo $meeting['Meeting']['number'];?></td>                        
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