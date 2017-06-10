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
 * Actions Controller
 *
 * @property Action $Action
 * @property PaginatorComponent $Paginator
 */
class ActionsController extends AppController {

	public function save() {
		Configure::write('debug',0);
		$this->autoRender = false;
		$this->layout = false;
		if ($this->request->is('ajax')) {
			$task_id = $this->data['task_id'];
			$action_date = $this->data['action_date'];
			
			$this->layout = 'ajax';			
			$this->Action->create();
			$this->Action->set('task_id',$task_id);
			$this->Action->set('action_date',$action_date);
			$this->Action->set('created',date("Y-m-d H:i:s"));
			$this->Action->save();
			echo $this->Action->getInsertID();
		}  
	}
	
	public function delete() {
		Configure::write('debug',0);
		$this->autoRender = false;
		$this->layout = false;
		if ($this->request->is('ajax')) {
			$this->layout = 'ajax';			
			$action_id = $this->data['action_id'];
			$this->Action->delete($action_id);
		}  
	}	
}
