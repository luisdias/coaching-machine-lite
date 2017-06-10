<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('CakeNumber', 'Utility');
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session','Auth', 'Cookie');

	public $paginate = array('limit' => 10);	
	
	public function beforeFilter() {
		parent::beforeFilter();
		// TODO: save to text file, load on bootstrap, store in session
		
		//$settings = ClassRegistry::init('Setting'); // load Setting model
		//$setting = $settings->find('first');
		//$language = $setting['Setting']['language'];
		//Configure::write('Config.language', $language);
		CakeNumber::addFormat('BRL', array('before' => 'R$ ', 'thousands' => '.', 'decimals' => ','));
		$this->Auth->authenticate = array('Form' => array(
			'fields' => array('username' => 'username','password' => 'password'),
			'passwordHasher' => array('className' => 'Simple','hashType' => 'sha256')
		));

		$this->Auth->userModel = 'User';
		$this->Auth->loginAction=array('controller'=>'users','action'=>'login');
		$this->Auth->loginRedirect=array('controller'=>'users','action'=>'index');
		$this->Auth->logoutRedirect=array('controller'=>'users','action'=>'login');
		$this->Auth->loginError=__('Invalid login or password');     
		$this->Auth->authError=__('Without access permission'); 
		$this->Auth->authorize = array('Controller');
	}	

	public function beforeRender()
	{
		$count = 0;
		$coachee_id = $this->Session->read('Coachee.User.id');
		if ( !is_null($coachee_id) )
		{			
			$this->set('coachee_id',$coachee_id);
			$this->loadModel('Link');
			$count = $this->Link->find('count',array('conditions'=> array('Link.user_id = ' => $coachee_id,'Link.status = ' => null)));				
		}
		$this->set('count',$count);
		return null;
	}
	
/**
 * index method
 *
 * @return void
 */
	public function index() {

		$this->setViewVariables();
		$this->setRelated();

		$count = 0;
		$user_role = $this->Session->read('Auth.User.role');
		$coachee_id = $this->Session->read('Coachee.User.id');
				
		// model has user_id column?
		if ($this->{$this->modelClass}->schema('user_id')) {						
			// Coach login with selected Coachee or Coachee login
			if ( isset($coachee_id) ) {
				$count = $this->{$this->modelClass}->find('count',array('conditions'=> array($this->modelClass.'.user_id = ' => $coachee_id)));
				$this->Paginator->settings = array('conditions'=> array($this->modelClass.'.user_id = ' => $coachee_id));
			// Coachee login
			} else {
				$count = $this->{$this->modelClass}->find('count');
				$this->Paginator->settings = $this->paginate;
			}
		} else {
			$count = $this->{$this->modelClass}->find('count');
			$this->Paginator->settings = $this->paginate;
		}	

		if ( $count == 0 ) {
			$this->Session->setFlash(__('There are no itens to list.'), 'alert-box', array('class'=>'alert-warning'));
		}
		
		$this->{$this->modelClass}->recursive = 0;
		$this->set(strtolower(Inflector::pluralize($this->modelClass)), $this->Paginator->paginate());		
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->{$this->modelClass}->exists($id)) {
			throw new NotFoundException(__('Invalid action'), 'alert-box', array('class'=>'alert-success'));
		}					
		$options = array('conditions' => array($this->modelClass.'.' . $this->{$this->modelClass}->primaryKey => $id));
		$this->set(strtolower($this->modelClass), $this->{$this->modelClass}->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->form();
		$this->render('form');
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->{$this->modelClass}->exists($id)) {
			throw new NotFoundException(__('Invalid action'));
		}
		$this->form($id);
		$this->render('form');
	}

/**
 * form method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function form($id = null) {
		$this->setViewVariables();
		if ($this->request->is(array('post', 'put'))) {
			if ($this->{$this->modelClass}->save($this->request->data)) {
				$this->Session->setFlash(__('The item has been saved.'), 'alert-box', array('class'=>'alert-success'));
				
				if ($this->request->query) {
					return $this->redirect(array('action' => 'index','?' => $this->request->query));
				} else {
					return $this->redirect(array('action' => 'index'));	
				}
				
				
			} else {
				$errors = $this->{$this->modelClass}->validationErrors;
				$this->Session->setFlash(__('The item could not be saved. Please, try again.'), 'alert-box', array('class'=>'alert-danger'));
			}
		} else {
			$options = array('conditions' => array($this->modelClass.'.' . $this->{$this->modelClass}->primaryKey => $id));
			$this->request->data = $this->{$this->modelClass}->find('first', $options);
		}
		$this->setRelated();
	}
	
	
/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
            
		$this->{$this->modelClass}->id = $id;
		if (!$this->{$this->modelClass}->exists()) {
			throw new NotFoundException(__('Invalid action'));
		}
		try { 
			$this->request->allowMethod('post', 'delete');
			if ($this->{$this->modelClass}->delete($id, true)) {
				$this->Session->setFlash(__('The item has been deleted.'), 'alert-box', array('class'=>'alert-success'));
			} else {
				$this->Session->setFlash(__('The item could not be deleted. Please, try again.'), 'alert-box', array('class'=>'alert-danger'));
			}		
		} catch (Exception $e) {
			$this->Session->setFlash(__('There are related records. Record was not deleted.',true), 'alert-box', array('class'=>'alert-danger'));		
		}
        
		//return $this->redirect(array('action' => 'index'));
		return $this->redirect($this->referer());
	}

	/**
	 * required when $this->Auth->authorize = 'controller';
	 * @return type 
	 */
	public function isAuthorized($user) {
		// filters for coachees
		$invalid_controllers = array(
			"Packs",
			"Meetings",
			"Payments",
			"ConfigWheels",
			"ConfigWheelSliceGroups",
			"ConfigWheelSlices",
			"ConfigDefaults",
		);
		
		$invalid_actions = array("add","delete","index","find");
		
		$invalid_params = array("config");
		
		if ($this->Auth->user('role') == 'Coach') {
			return true;
		}
	
		if ($this->action == 'logout' || $this->action == 'login') {
			return true;
		}

		if ($this->Auth->user('role') == 'Coachee') {
			// TODO bugfix loop with TasksController
			if ($this->name == "Tasks" ) {
				if (in_array($this->action,$invalid_actions)) {
					return $this->redirect(array('controller' => 'tasks', 'action' => 'calendar',
						$this->Session->read('Coachee.User.id'),
						$this->Session->read('Coachee.Pack.id')));
				}				
			}				
			
			if (in_array($this->name,$invalid_controllers)) {

				return $this->redirect(array('controller' => 'tasks', 'action' => 'calendar',
					$this->Session->read('Coachee.User.id'),
					$this->Session->read('Coachee.Pack.id')));

			}
			if ($this->name == "Users" ) {
				if (in_array($this->action,$invalid_actions)) {
					return $this->redirect(array('controller' => 'tasks', 'action' => 'calendar',
						$this->Session->read('Coachee.User.id'),
						$this->Session->read('Coachee.Pack.id')));
				}
				// TODO
				// verify id
				if ($this->action == "edit") {
					
				}
			}
			if ($this->name == "Pages" ) {
				if (in_array($this->params['pass'][0],$invalid_params)) {

					return $this->redirect(array('controller' => 'tasks', 'action' => 'calendar',
						$this->Session->read('Coachee.User.id'),
						$this->Session->read('Coachee.Pack.id')));
				}				
			}				
		}
		return true;
	} 	

	public function setViewVariables() {
		$coachee_id = $this->Session->read('Coachee.User.id');
		$coachee_name = $this->Session->read('Coachee.User.name');
		$active_pack_id = $this->Session->read('Coachee.Pack.id');
		if ( isset($coachee_id) && isset($active_pack_id) ) {
			$this->set('coachee_id',$coachee_id);	
			$this->set('active_pack_id',$active_pack_id);
			$this->set('coachee_name',$coachee_name);					
		}	   
        $this->set('referer',$this->referer());
	}
	
	public function find() {
		$this->setRelated();
		$this->Prg->commonProcess();
		$this->Paginator->settings['conditions'] = $this->{$this->modelClass}->parseCriteria($this->Prg->parsedParams());
		$this->set(strtolower(Inflector::pluralize($this->modelClass)), $this->Paginator->paginate());
		$this->render('index');
	}
	
	/**
	 * run during actions add,edit e view
	 */
	public function setRelated() {
	} 
	
}