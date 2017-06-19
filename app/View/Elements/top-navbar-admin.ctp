                <!-- top nav -->
              	<div class="navbar navbar-blue navbar-static-top">  
                    <div class="navbar-header">
                      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle</span>
                        <span class="icon-bar"></span>
          				<span class="icon-bar"></span>
          				<span class="icon-bar"></span>
                      </button>
											<?php echo $this->Html->link('cm', array('controller' => 'pages','action' => 'index'),array('escape' => false, 'class'=>'navbar-brand logo')); ?>
                  	</div>
                  	<nav class="collapse navbar-collapse" role="navigation">
						<?php
						echo $this->Form->create('User', array(
							'url' => array_merge(
									array(
										'action' => 'find'
									),
									$this->params['pass']
								),
							'class' => "navbar-form navbar-left"
							)
						);						
						?>
            <div class="input-group input-group-sm" style="max-width:360px;">
							<?php echo $this->Form->input('name', array(
								'label' => false,
								'div' => false, 
								'class' => 'form-control',
								'placeholder' =>__('Search')
							)); ?>
						  					  
							<div class="input-group-btn">
							<?php
							echo $this->Form->button('<i class="glyphicon glyphicon-search"></i>', array(
							'div' => false,
							'class' => 'btn btn-default',
							'type' => 'submit',
							'escape' => false
							));
							?>
							</div>
						</div>
						<?php echo $this->Form->end(); ?>
                    <ul class="nav navbar-nav">
                      <li>
						<?php echo $this->Html->link('<i class="glyphicon glyphicon-home"></i> '.__('Home'), array('controller' => 'pages','action' => 'index'),array('escape' => false)); ?>
											</li>
											<li>
						<?php echo $this->Html->link('<i class="glyphicon glyphicon-user"></i> '.__('Users'), array('controller' => 'users','action' => 'index'),array('escape' => false)); ?>
                      </li>
                      <li>
						<?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> '.__('New User'), array('controller' => 'users','action' => 'add'),array('escape' => false)); ?>
                      </li>
                      <li>
						<?php echo $this->Html->link('<i class="glyphicon glyphicon-lock"></i> '.__('Coach') . ' :: ' . $this->Session->read('Auth.User.name'), array('controller' => 'users','action' => 'edit',$this->Session->read('Auth.User.id')),array('escape' => false)); ?>
                      </li>					  
                    </ul>
                    <ul class="nav navbar-nav navbar-right tcm-navbar">
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-cog"></i></a>
                        <ul class="dropdown-menu">	
						  <li>
							<?php echo $this->Html->link('<i class="glyphicon glyphicon-wrench"></i> '.__('Configuration'), array('controller' => 'pages', 'action' => 'config'),array('escape'=>false)); ?>
						  </li>
						  <li><hr></li>
                          <li>
						  <?php echo $this->Html->link('<i class="glyphicon glyphicon-log-out"></i> '.__('Log Out'), array('controller' => 'users', 'action' => 'logout'),array('escape'=>false)); ?>
						  </li>
                        </ul>
                      </li>
                    </ul>
                  	</nav>
                </div>
                <!-- /top nav -->