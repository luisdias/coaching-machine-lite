                <!-- top nav -->
              	<div class="navbar navbar-light-blue navbar-static-top">  
                    <div class="navbar-header">
                      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle</span>
                        <span class="icon-bar"></span>
          				<span class="icon-bar"></span>
          				<span class="icon-bar"></span>
                      </button>
                      <a href="#" class="navbar-brand logo">cm</a>
                  	</div>
                  	<nav class="collapse navbar-collapse" role="navigation">						
						<ul class="nav navbar-nav">
						  <li>
							<?php echo $this->Html->link('<i class="glyphicon glyphicon-home"></i> '.__('Home'), array('controller' => 'tasks','action' => 'calendar',
							$this->Session->read('Coachee.User.id'),
							$this->Session->read('Coachee.Pack.id')),
							array('escape' => false)); ?>
						  </li>
						  <li>
							<?php echo $this->Html->link('<i class="glyphicon glyphicon-user"></i> '.__('User') . ' :: ' . $this->Session->read('Auth.User.name'), array('controller' => 'users','action' => 'edit',$this->Session->read('Auth.User.id')),array('escape' => false)); ?>
						  </li>
						  <li>
							<?php echo $this->Html->link('<i class="glyphicon glyphicon-envelope"></i> ' . ( $count > 0 ? '<span class="badge badge-orange">'.$count.'</span>' : ''), array('controller' => 'links','action' => 'index'),array('escape' => false)); ?>						  							
						  </li> 
						</ul>
						<ul class="nav navbar-nav navbar-right">
						  <li>
							<?php echo $this->Html->link('<i class="glyphicon glyphicon-log-out"></i> '.__('Log Out'), array('controller' => 'users', 'action' => 'logout'),array('escape'=>false)); ?>
						  </li>	
						</ul>
                  	</nav>
                </div>
                <!-- /top nav -->