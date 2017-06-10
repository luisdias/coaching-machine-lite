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
 * Tasks Controller
 *
 * @property Task $Task
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TasksController extends AppController {	
	
	public $components = array(
		'Search.Prg'
	);	
	
	public function setRelated() {
		$next_number = 1;		
		$coachee_id = $this->Session->read('Coachee.User.id');
		$active_pack_id = $this->Session->read('Coachee.Pack.id');
		
		if ( $this->action == 'add' && isset($coachee_id) && isset($active_pack_id) ) {
			$next_number = $this->Task->nextTaskNumber($coachee_id,$active_pack_id);
			$this->set('next_number',$next_number);
		}
		
		$users = $this->Task->User->find('list',array('conditions' => array('User.role' => 'Coachee')));
		$packs = $this->Task->Pack->find('list');		
		$this->set(compact('users','packs'));		
	}
	
	/* 
	* User Calendar with Tasks
	*
	*/
	public function calendar($user_id = null, $pack_id = null) {
		
		if (is_null($user_id)) {
			$this->Session->setFlash(__('Invalid User'), 'alert-box', array('class'=>'alert-warning'));
			return $this->redirect(array('controller'=>'Links','action' => 'index'));
		}

		if (is_null($pack_id)) {
			$this->Session->setFlash(__('Invalid Pack'), 'alert-box', array('class'=>'alert-warning'));
			return $this->redirect(array('controller'=>'Links','action' => 'index'));
		}
		
		$pack = $this->Task->Pack->find('all',array(
			'fields' => array('Pack.start_date','Pack.end_date'),
			'conditions' => array('Pack.id' => $pack_id,'Pack.user_id' => $user_id),
			'recursive' => 0
			)
		);
		
		if (empty($pack)) {
			$this->Session->setFlash(__('Invalid Pack'), 'alert-box', array('class'=>'alert-warning'));
			return $this->redirect(array('controller'=>'Links','action' => 'index'));			
		}

		$pack_start_date = $pack[0]['Pack']['start_date'];
		$pack_end_date = $pack[0]['Pack']['end_date'];
		
		$tasks = $this->Task->find('all',array(
			'fields' => array(
				'Task.id',
				'Task.number',
				'Task.title',
				'Task.repeat_type',
				'Task.sunday',
				'Task.monday',
				'Task.tuesday',
				'Task.wednesday',
				'Task.thursday',
				'Task.friday',
				'Task.saturday',
				'Task.start_date',
				'Task.time',
				'Task.day_of_the_month',
				'Task.end_date',
			),
			'conditions' => array(
				'Task.user_id' => $user_id, 'Task.pack_id' => $pack_id
			),
			'recursive' => 1
			)
		);		
		//debug($tasks); die();
		if (empty($tasks)) 
		{
			$this->Session->setFlash(__('There are no itens to list.'), 'alert-box', array('class'=>'alert-warning'));			
		}		
		
		$today = date('Y-m-d');
		$month = date("m");
		$year = date("Y");
		$last_day_of_month = date("t", strtotime($today));
		
		$js = "
		$(document).ready(function() {
			today = new Date();
			$('#calendar').fullCalendar({
				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'month,agendaWeek,agendaDay'
				},
				eventClick: function(calEvent, jsEvent, view) {
					$.blockUI();
					var d = new Date(calEvent.start),
						month = '' + (d.getMonth() + 1),
						day = '' + d.getDate(),
						year = d.getFullYear();

					if (month.length < 2) month = '0' + month;
					if (day.length < 2) day = '0' + day;
					task_date = [year, month, day].join('-');
					
					if (calEvent.color != 'green') {
						$.ajax({
						type: \"POST\",
						url: rootUrl + \"actions/save\",
						dataType: 'text',
						data: 'task_id='+calEvent.task_id+'&'+'action_date='+task_date,
						success: function(data, textStatus){
							calEvent.color = 'green';
							calEvent.textColor = 'white';
							$('#calendar').fullCalendar( 'rerenderEvents' );
							calEvent.action_id = data;
							$.unblockUI();
						},
						error: function(msg) {         
							$.unblockUI();
							alert('Error!');
						}
						});
					} else {
						$.ajax({
						type: \"POST\",
						url: rootUrl + \"actions/delete\",
						dataType: 'text',
						data: 'action_id='+calEvent.action_id,
						success: function(data, textStatus){
							calEvent.action_id = 0;
							if (calEvent.start < today) {
								calEvent.color = 'grey';
								calEvent.textColor = 'white';														
							} else {
								calEvent.color = 'yellow';
								calEvent.textColor = 'black';							
							}
							$('#calendar').fullCalendar( 'rerenderEvents' );
							$.unblockUI();
						},
						error: function(msg) {         
							$.unblockUI();
							alert('Error!');
						}
						});						
					};					
				},			
				events: [ ";
		
		$day = $pack_start_date;
		
		do {
			reset($tasks);
			foreach($tasks as $task) :
				$js .= $this->getScript($task,$day,$today);				
			endforeach;
			$day = date('Y-m-d',strtotime("+1 day", strtotime($day)));
		} while ($day <= $pack_end_date );
		
		
		/*
		foreach($tasks as $task) :
			$day = $pack_start_date;
			do {
				$js .= $this->getScript($task,$day,$today);				
				$day = date('Y-m-d',strtotime("+1 day", strtotime($day)));				
			} while ($day <= $pack_end_date );			
		endforeach;		
		*/
		
		/* TODO 
		LDIAS 22/04/2016 - do not use pack_end_date, 
		use task_end_date instead
		for tasks with repeat_type == 0
		*/
		
		//debug($js); die();
		// remove last comma
		$js = substr($js, 0, -1);
		
		$js .= ']'. "\n";
 		$js .= '   })'. "\n";
		$js .= '});'. "\n";
		
		$this->set('js',$js);		
	}
	/* 
	* getScript
	* $task
	* $date
	* $today
	*/
	public function getScript($task = null, $date = null, $today = null) {
		$output = "";
		
		// no repetion
		if ($task['Task']['repeat_type'] == '0') {
			if ($task['Task']['end_date'] == null || empty($task['Task']['end_date'])) 
			{
				if ($date == $task['Task']['start_date']) 
				{
					$output .= $this->getSnippet($task,$date,$today);
				}
			} 
			else // period with start and end date once
			{
				if (($date >= $task['Task']['start_date']) && ($date <= $task['Task']['end_date']))
				{
					$output .= $this->getSnippet($task,$date,$today);
				}
			}
			
		}		
		
		// daily
		if ($task['Task']['repeat_type'] == 'D' && $task['Task']['start_date'] <= $date ) {
			$output .= $this->getSnippet($task,$date,$today);
		}

		// Monday to Friday
		if ( $task['Task']['repeat_type'] == '2-6' && $task['Task']['start_date'] <= $date ) {
			$day_of_the_week = (int) date("w",strtotime($date));
							
			if ( ($day_of_the_week > 0) && ($day_of_the_week < 6) ) {
				$output .= $this->getSnippet($task,$date,$today);				
			}				
		}
		
		
		// Monday, Wednesday and Friday
		if ( $task['Task']['repeat_type'] == '2,4,6' && $task['Task']['start_date'] <= $date ) {
			$day_of_the_week = (int) date("w",strtotime($date));
							
			if ( ($day_of_the_week == 1) || ($day_of_the_week == 3) || ($day_of_the_week == 5) ) {
				$output .= $this->getSnippet($task,$date,$today);				
			}				
		}		
		
		// Tuesday and Thursday
		if ( $task['Task']['repeat_type'] == '3,5' && $task['Task']['start_date'] <= $date ) {
			$day_of_the_week = (int) date("w",strtotime($date));
							
			if ( ($day_of_the_week == 2) || ($day_of_the_week == 4) ) {
				$output .= $this->getSnippet($task,$date,$today);				
			}
		}
		
		// Weekly - days selected by user
		if ( $task['Task']['repeat_type'] == 'W' && $task['Task']['start_date'] <= $date ) {
			$day_of_the_week = (int) date("w",strtotime($date));
			$doit = false;
			if ( $task['Task']['sunday'] && $day_of_the_week == 0 ) {
				$doit = true;
			}
			if ( $task['Task']['monday'] && $day_of_the_week == 1 ) {
				$doit = true;
			}
			if ( $task['Task']['tuesday'] && $day_of_the_week == 2 ) {
				$doit = true;
			}
			if ( $task['Task']['wednesday'] && $day_of_the_week == 3 ) {
				$doit = true;
			}
			if ( $task['Task']['thursday'] && $day_of_the_week == 4 ) {
				$doit = true;
			}
			if ( $task['Task']['friday'] && $day_of_the_week == 5 ) {
				$doit = true;
			}
			if ( $task['Task']['saturday'] && $day_of_the_week == 6 ) {
				$doit = true;
			}					
			
			if ( $doit ) {
				$output .= $this->getSnippet($task,$date,$today);
			}
		}
		
		return $output;
	}
	
	public function getSnippet($task = null, $date = null, $today = null) {

		$snippet = "";
		$snippet .= '{' . "\n";
		$snippet .= 'task_id  : "'.$task['Task']['id'].'",'. "\n";				
		$snippet .= 'title  : "'.$task['Task']['title'].'",'. "\n";
		$snippet .= 'start  : "'.$date.'",'. "\n";
		
		$color = 'yellow';
		$textcolor = 'black';
		$action_id = 0;
		
		if ($date < $today) {
			$color = 'grey';
			$textcolor = 'white';
		} 			
		if (!empty($task['Action'])) {
			foreach($task['Action'] as $action):
				if (date('Y-m-d',strtotime($action['action_date'])) == $date) {
					$action_id = $action['id'];
					$color = 'green';
					$textcolor = 'white';
					break;
				} 
			endforeach;				
		}
		
		$snippet .= 'action_id  : "'.$action_id.'",' . "\n";
		$snippet .= 'textColor  : "'.$textcolor.'",' . "\n";
		$snippet .= 'color  : "'.$color.'",' . "\n";
		$snippet .= '},' . "\n";
		
		return $snippet;
	}
}