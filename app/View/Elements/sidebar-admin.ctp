            <!-- sidebar -->
            <div class="column col-sm-2 col-xs-1 sidebar-offcanvas" id="sidebar">
              
              	<ul class="nav">
          			<li><a href="#" data-toggle="offcanvas" class="visible-xs text-center"><i class="glyphicon glyphicon-chevron-right"></i></a></li>
            	</ul>
               
                <ul class="nav hidden-xs" id="lg-menu">
				    <li>
					<?php if (!is_null($this->Session->read('Coachee.User.id'))) {
						$photo = $this->Session->read('Coachee.User.photo');
						$sex = $this->Session->read('Coachee.User.sex');
						$userName = $this->Session->read('Coachee.User.name');
						if (!is_null($photo)) {
							echo $this->Html->image('/files/user/photo/'.$this->Session->read('Coachee.User.id').'/'.$this->Session->read('Coachee.User.photo'), 
							array('alt' => $this->Session->read('Coachee.User.name'), 
							'class' => 'img-circle img-responsive center-block'));
						} else {				
							if (empty($photo)) 
							{
								if ($sex == "M") 
								{
									echo $this->Html->image('john-doe.png', array('alt' => $userName, 'class' => 'img-circle img-responsive center-block'));
								}
								else if ($sex == "F") 
								{
									echo $this->Html->image('jane-doe.png', array('alt' => $userName, 'class' => 'img-circle img-responsive center-block'));
								}
								else
								{
									echo $this->Html->image('no-user.png', array('alt' => $userName, 'class' => 'img-circle img-responsive center-block'));								
								}					
							}
						}
						echo '<h4>'.$userName.'</h4>';
					} else {
						echo $this->Html->image('users.png', array('alt' => 'Users', 'class' => 'img-circle img-responsive center-block'));
						echo '<h4>'.__('All').'</h4>';
					} ?>										
					</li>
                    <li class="active">
						<?php echo $this->Html->link('<i class="glyphicon glyphicon-th-large"></i> '.__('Packs'), array('controller' => 'packs', 'action' => 'index'),array('escape'=>false)); ?>
					</li>
					<li>
						<?php echo $this->Html->link('<i class="glyphicon glyphicon-folder-open"></i> '.__('Meetings'), array('controller' => 'meetings', 'action' => 'index'),array('escape'=>false)); ?>
					</li>
                    <li>
						<?php echo $this->Html->link('<i class="glyphicon glyphicon-tasks"></i> '.__('Tasks'), array('controller' => 'tasks', 'action' => 'index'),array('escape'=>false)); ?>
					</li>
                    <li>
						<?php echo $this->Html->link('<i class="glyphicon glyphicon-usd"></i> '.__('Payments'), array('controller' => 'payments', 'action' => 'index'),array('escape'=>false)); ?>
					</li>

					<?php  if ( file_exists('pro.txt') ) { ?>					
                    <li>
						<?php echo $this->Html->link('<i class="glyphicon glyphicon-globe"></i> '.__('Links'), array('controller' => 'links','action' => 'index'),array('escape'=>false)); ?>
					</li>
                    <li>
						<?php echo $this->Html->link('<i class="glyphicon glyphicon-list-alt"></i> '.__('Surveys'), array('controller' => 'surveys','action' => 'index'),array('escape'=>false)); ?>
					</li>					
                    <li>
						<?php echo $this->Html->link('<i class="glyphicon glyphicon-dashboard"></i> '.__('Wheels'), array('controller' => 'wheels', 'action' => 'index'),array('escape'=>false)); ?>
					</li>
					<?php } ?>

					<?php if (!is_null($this->Session->read('Coachee.User.id'))) { ?>
                    <li>
						<?php echo $this->Html->link('<i class="glyphicon glyphicon-refresh"></i> '.__('Reset'), array('controller' => 'users', 'action' => 'reset_user'),array('escape'=>false)); ?>
					</li>
					<?php } ?>
                </ul>
                <ul class="list-unstyled hidden-xs" id="sidebar-footer">
                    <li>
                      <a href="#"><h3>The Coaching</h3> <i class="glyphicon glyphicon-ok-sign"></i> Machine</a>
                    </li>
                </ul>
              
              	<!-- tiny only nav-->
              <ul class="nav visible-xs" id="xs-menu">			  
                  	<li>
						<?php echo $this->Html->link('<i class="glyphicon glyphicon-th-large"></i> ', array('controller' => 'packs', 'action' => 'index'),array('escape'=>false)); ?>
					</li>
					<li>
						<?php echo $this->Html->link('<i class="glyphicon glyphicon-folder-open"></i> ', array('controller' => 'meetings', 'action' => 'index'),array('escape'=>false)); ?>
					</li>
                    <li>
						<?php echo $this->Html->link('<i class="glyphicon glyphicon-tasks"></i> ', array('controller' => 'tasks', 'action' => 'index'),array('escape'=>false)); ?>
					</li>
                  	<li>
						<?php echo $this->Html->link('<i class="glyphicon glyphicon-usd"></i> ', array('controller' => 'payments', 'action' => 'index'),array('escape'=>false)); ?>
					</li>

					<?php  if ( file_exists('pro.txt') ) { ?>

                    <li>
						<?php echo $this->Html->link('<i class="glyphicon glyphicon-globe"></i> ', array('controller' => 'links','action' => 'index'),array('escape'=>false)); ?>
					</li>
                    <li>
						<?php echo $this->Html->link('<i class="glyphicon glyphicon-list-alt"></i> ', array('controller' => 'surveys','action' => 'index'),array('escape'=>false)); ?>
					</li>					
                    <li>
						<?php echo $this->Html->link('<i class="glyphicon glyphicon-dashboard"></i> ', array('controller' => 'wheels', 'action' => 'index'),array('escape'=>false)); ?>
					</li>

					<?php } ?>

					<?php if (!is_null($this->Session->read('Coachee.User.id'))) { ?>
                    <li>
						<?php echo $this->Html->link('<i class="glyphicon glyphicon-refresh"></i> ', array('controller' => 'users', 'action' => 'reset'),array('escape'=>false)); ?>
					</li>
					<?php } ?>
                </ul>
              
            </div>
            <!-- /sidebar -->