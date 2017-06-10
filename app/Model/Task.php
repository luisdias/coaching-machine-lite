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

App::uses('AppModel', 'Model');
/**
 * Task Model
 *
 * @property User $User
 * @property Pack $Pack
 * @property Action $Action
 */
class Task extends AppModel {

    public $actsAs = array('Search.Searchable');

	public $filterArgs = array(
		'pack_id' => array(
			'type' => 'like'
		),
		'user_id' => array(
			'type' => 'like'
		),		
	);

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

/**
 * Validation rules
 *
 * @var array
 */
 
 	public function __construct($id = false , $table = null , $ds = null) {
		parent::__construct($id, $table, $ds);
		$this->validate = array(
			'user_id' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => __('User is required',true),
					//'allowEmpty' => false,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
			),
			'pack_id' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => __('Pack is required',true),
				),
				'isValidPack'=> array(
					'rule' => array('isValidPack'),
					'message' => __('Pack does not belong to User',true),
				),
			),	
			'number' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => __('Number is required',true),
				),
			),            
			'title' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => __('Title is required',true),
				),
			),
			'description' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => __('Description is required',true),
				),
			),
			'repeat_type' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => __('Select the repeat type',true),
				),
				'isValidRepeatType'=> array(
					'rule' => array('isValidRepeatType'),
					'message' => __('Select at least one day',true),
				),				
			),
			'start_date' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => __('Start Date is required',true),
					'required' => true,
				),
			),
			'time' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => __('Time is required',true),
					'required' => true,
				),
			),
		);
	}

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Pack' => array(
			'className' => 'Pack',
			'foreignKey' => 'pack_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Action' => array(
			'className' => 'Action',
			'foreignKey' => 'task_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	public function nextTaskNumber($user_id = null, $pack_id = null) {
		
		$next = $this->find('all',array(
			'fields' => array('MAX(Task.number) AS number'),
			'conditions' => array('Task.user_id' => $user_id, 'Task.pack_id' => $pack_id)			
			));

		if (!empty($next)) {
			return $next[0][0]['number'] + 1;
		}
		return 1;
	}
	
	public function isValidPack() {
		$user_id = $this->data[$this->alias]['user_id'];		
		$pack_id = $this->data[$this->alias]['pack_id'];
		$valid_pack = $this->Pack->find('all', array(
			'conditions' => array('Pack.user_id' => $user_id, 'Pack.id' => $pack_id),
			'recursive' => 0)
		);
		if (empty($valid_pack)) {
			return false;
		} else {
			return true;	
		}		
	}
	
	public function isValidRepeatType() {
		$repeat_type = $this->data[$this->alias]['repeat_type'];
		$sunday = $this->data[$this->alias]['sunday'];
		$monday = $this->data[$this->alias]['monday'];
		$tuesday = $this->data[$this->alias]['tuesday'];
		$wednesday = $this->data[$this->alias]['wednesday'];
		$thursday = $this->data[$this->alias]['thursday'];
		$friday = $this->data[$this->alias]['friday'];
		$saturday = $this->data[$this->alias]['saturday'];			
		
		if ( $repeat_type == "W" && !$sunday && !$monday && !$tuesday && !$wednesday && !$thursday && !$friday && !$saturday ) {
			return false;
		} else {
			return true;
		}
	}
	
}