<?php
/*
MIT License

Copyright (c) 2017 Luís Dias

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
*/
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UsersController extends AppController {

	public $components = array(
		'Search.Prg'
	);

	public function login() {
		$this->layout = 'login';
		if ($this->request->is('post')) {		
			if ($this->Auth->login()) {
				// if user role = coachee save user as coachee in session
				if ($this->Session->read('Auth.User.role') == 'Coachee') {
					$this->select($this->Session->read('Auth.User.id'));					
				}				
				$this->redirect($this->Auth->redirectUrl());
			} else {
				$this->Session->setFlash(__('Invalid username or password, try again'), 'alert-box', array('class'=>'alert-danger'));
			}		
		}
	}

	public function logout() {
		$this->Session->delete('Coachee');
		$this->redirect($this->Auth->logout());
	}

	public function select($id = null) {
		$this->User->recursive = 0;
		$coachee = $this->User->findById($id);
		
		if (empty($coachee)) 
		{
			$this->Session->setFlash(__('Invalid user'), 'alert-box', array('class'=>'alert-danger'));
			return $this->redirect(array('controller' => 'users', 'action' => 'index'));
		}
		
		$active_pack = $this->User->Pack->find('first',array(
			'conditions' => array('Pack.user_id' => $coachee['User']['id'], 'Pack.status' => 'Active'),
			'recursive' => 0
		));

		if (empty($active_pack)) 
		{
			$this->Session->setFlash(__('No active pack of meetings for this user'), 'alert-box', array('class'=>'alert-danger'));
			$this->logout();
		} 

		$this->Session->write('Coachee',$coachee);
		$this->Session->write('Coachee.Pack',$active_pack['Pack']);
		if ($this->Session->read('Auth.User.role') == 'Coach') 
		{		
			$this->redirect(array('controller' => 'users', 'action' => 'index'));
		}
		else // Coachee
		{
			$this->redirect(array('controller' => 'tasks', 'action' => 'calendar',
					$this->Session->read('Coachee.User.id'),
					$this->Session->read('Coachee.Pack.id')));
		}
	}

	public function reset() {
		$this->Session->delete('Coachee');
		$this->redirect(array('controller' => 'users', 'action' => 'index'));
	}

	public function delete($id = null) {
		if ( $id == $this->Session->read('Coachee.User.id') ) {
			$this->reset();	
		}		
		parent::delete($id);
	}

}