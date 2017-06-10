            <!-- sidebar -->
            <div class="column col-sm-2 col-xs-1 sidebar-offcanvas" id="sidebar">
              
              	<ul class="nav">
          			<li><a href="#" data-toggle="offcanvas" class="visible-xs text-center"><i class="glyphicon glyphicon-chevron-right"></i></a></li>
            	</ul>
               
                <ul class="nav hidden-xs" id="lg-menu">
				    <li>
					<?php if (!is_null($this->Session->read('Coachee.User.id'))) {
						if (!is_null($this->Session->read('Coachee.User.photo'))) {
							echo $this->Html->image('/files/user/photo/'.$this->Session->read('Coachee.User.id').'/'.$this->Session->read('Coachee.User.photo'), 
							array('alt' => $this->Session->read('Coachee.User.name'), 
							'class' => 'img-circle img-responsive center-block'));
						} else {
							echo $this->Html->image('john-doe.png', array('alt' => 'John Doe', 'class' => 'img-circle img-responsive center-block'));
						}
						echo '<h4>'.$this->Session->read('Coachee.User.name').'</h4>';
					} else {
						echo $this->Html->image('users.png', array('alt' => 'Users', 'class' => 'img-circle img-responsive center-block'));
					} ?>										
					</li>
                    <li>
						<?php echo $this->Html->link('<i class="glyphicon glyphicon-tasks"></i> '.__('Tasks'), 
						array(
							'controller' => 'tasks', 
							'action' => 'calendar',
							$this->Session->read('Coachee.User.id'),
							$this->Session->read('Coachee.Pack.id')
							),array('escape'=>false)
						); 
						?>
					</li>
                    <li>
						<?php echo $this->Html->link('<i class="glyphicon glyphicon-list-alt"></i> '.__('Surveys'), 
						array('controller' => 'surveys','action' => 'index'),array('escape'=>false)); ?>
					</li>
                    <li>
						<?php echo $this->Html->link('<i class="glyphicon glyphicon-dashboard"></i> '.__('Wheels'), 
						array(
						'controller' => 'wheels', 
						'action' => 'index'),
						array('escape'=>false)); ?>
					</li>					
                </ul>
                <ul class="list-unstyled hidden-xs" id="sidebar-footer">
                    <li>
                      <a href="#"><h3>The Coaching</h3> <i class="glyphicon glyphicon-ok-sign"></i> Machine</a>
                    </li>
                </ul>
              
              	<!-- tiny only nav-->
              <ul class="nav visible-xs" id="xs-menu">			  
                    <li>
						<?php echo $this->Html->link('<i class="glyphicon glyphicon-tasks"></i> ', array('controller' => 'tasks', 'action' => 'index'),array('escape'=>false)); ?>
					</li>
                    <li>
						<?php echo $this->Html->link('<i class="glyphicon glyphicon-list-alt"></i> ', array('controller' => 'surveys','action' => 'index'),array('escape'=>false)); ?>
					</li>					
                    <li>
						<?php echo $this->Html->link('<i class="glyphicon glyphicon-dashboard"></i> ', array('controller' => 'wheels', 'action' => 'index'),array('escape'=>false)); ?>
					</li>					
                </ul>
              
            </div>
            <!-- /sidebar -->