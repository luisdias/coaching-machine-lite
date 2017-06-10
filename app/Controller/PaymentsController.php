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
 * Payments Controller
 *
 * @property Payment $Payment
 * @property PaginatorComponent $Paginator
 */
class PaymentsController extends AppController {
	
	public $components = array(
		'Search.Prg'
	);	

	public function setRelated() {
		$next_number = 1;
		$coachee_id = $this->Session->read('Coachee.User.id');
		$active_pack_id = $this->Session->read('Coachee.Pack.id');
		
		if ( $this->action == 'add' && isset($coachee_id) && isset($active_pack_id) ) {
			$next_number = $this->Payment->nextPaymentNumber($coachee_id,$active_pack_id);
			$this->set('next_number',$next_number);	
		} 
		
		$users = $this->Payment->User->find('list',array('conditions' => array('User.role' => 'Coachee')));
		$packs = $this->Payment->Pack->find('list');
		$this->set(compact('users','packs'));		
	} 
}
