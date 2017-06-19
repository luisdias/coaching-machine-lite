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
 * Pack Model
 *
 * @property User $User
 * @property EnneagramTest $EnneagramTest
 * @property Payment $Payment
 * @property Session $Session
 * @property Task $Task
 * @property Wheel $Wheel
 */
class Pack extends AppModel {
	
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

    public $actsAs = array('Search.Searchable');

	public $filterArgs = array(
		'user_id' => array(
			'type' => 'like'
		),		
	);	
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
			'status' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => __('Status is required',true),
					//'allowEmpty' => false,
					'required' => true,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
				'checkStatusOnCreate' => array(
					'on' => 'create',
					'rule' => array('checkStatusOnCreate'),
					'message' => __('There is an active pack for this user',true),
					//'allowEmpty' => false,
					//'required' => true,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
				'checkStatusOnUpdate' => array(
					'on' => 'update',
					'rule' => array('checkStatusOnUpdate'),
					'message' => __('There is an active pack for this user',true),
					//'allowEmpty' => false,
					//'required' => true,
					//'last' => true, // Stop validation after this rule
					//'on' => 'update', // Limit validation to 'create' or 'update' operations
				),				
			),
			'title' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => __('Title is required',true),
					//'allowEmpty' => false,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
			),
			'number_of_meetings' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => __('Number of meetings is required',true),
					//'allowEmpty' => false,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
			),
			'meeting_price' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => __('Meeting price is required',true),
					//'allowEmpty' => false,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
			),
			'start_date' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => __('Start Date is required',true),
					//'allowEmpty' => false,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
			),
			'end_date' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => __('End Date is required',true),
					//'allowEmpty' => false,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
				'verifyDates' => array(
					'rule' => 'checkDates',
					'message' => __('Start Date can not be greater than End Date',true),
					//'allowEmpty' => false,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),				
			),
			'session_periodicity' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => __('Session Periodicity is required',true),
					//'allowEmpty' => false,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
			),			
		);
	}

	//The Associations below have been created with all possible keys, those that are not needed can be removed

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
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Payment' => array(
			'className' => 'Payment',
			'foreignKey' => 'pack_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Meeting' => array(
			'className' => 'Meeting',
			'foreignKey' => 'pack_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Task' => array(
			'className' => 'Task',
			'foreignKey' => 'pack_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Wheel' => array(
			'className' => 'Wheel',
			'foreignKey' => 'pack_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Link' => array(
			'className' => 'Link',
			'foreignKey' => 'pack_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Survey' => array(
			'className' => 'Survey',
			'foreignKey' => 'pack_id',
			'dependent' => true,
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

    public function afterSave($created, $options = array()) {
        parent::afterSave($created, $options);
		App::uses('CakeSession','Model/Datasource');
		$coachee_id = CakeSession::read('Coachee.User.id');
		$active_pack_id = CakeSession::read('Coachee.Pack.id');

		$user_id = $this->data['Pack']['user_id'];;
		$pack_id = $this->data['Pack']['id'];;
		$start_date = $this->data['Pack']['start_date'];
		$end_date = $this->data['Pack']['end_date'];
		$meeting_periodicity = $this->data['Pack']['meeting_periodicity'];
		$meeting_time = $this->data['Pack']['meeting_time'];
		$number_of_meetings = $this->data['Pack']['number_of_meetings'];
		$meeting_price = $this->data['Pack']['meeting_price'];		

		if ( ($this->data[$this->alias]['user_id'] == $coachee_id) && is_null($active_pack_id) ) {
			if ($this->data[$this->alias]['status'] == 'Active') {			
				CakeSession::write('Coachee.Pack.id',$pack_id);
			}			
		}
		if ($created) {
			$this->createMeetings(
				$pack_id, 
				$user_id, 				
				$start_date, 
				$end_date, 
				$meeting_periodicity, 
				$meeting_time,
				$number_of_meetings
			);

			$this->createPayments(
				$pack_id, 
				$user_id, 				
				$start_date, 
				$number_of_meetings,
				$meeting_price
			);
			
		}
	}
	
	public function checkDates() {
		if( $this->data[$this->alias]['start_date'] > $this->data[$this->alias]['end_date'] ) {
			return false;
		} else {
			return true;
		}
	}
	
	public function checkStatusOnCreate($check) {
		$user_id = $this->data[$this->alias]['user_id'];
		$status  = $this->data[$this->alias]['status'];
		$user = $this->find('all',array(
			'conditions' => array('Pack.user_id' => $user_id, 'Pack.status' => 'Active'))
		);
		if( !empty($user) && $status == "Active") {
			return false;
		} else {
			return true;
		}
	}	

	public function checkStatusOnUpdate($check) {
		$pack_id = $this->data[$this->alias]['id'];
		$user_id = $this->data[$this->alias]['user_id'];
		$status  = $this->data[$this->alias]['status'];
		$user = $this->find('all',array(
			'conditions' => array('Pack.user_id' => $user_id, 'Pack.status' => 'Active', 'Pack.id != ' => $pack_id))
		);
		if( !empty($user) && $status == "Active") {
			return false;
		} else {
			return true;
		}
	}

	public function createMeetings($pack_id, $user_id, $start_date, $end_date, $meeting_periodicity, $meeting_time, $number_of_meetings) {
		$d = $start_date;
		switch ($meeting_periodicity) {
			case 7:
				$per = "+7 day";
				break;
			case 15:
				$per = "+15 day";
				break;
			case 30:
				$per = "+30 day";
				break;
			default:
				$per = "+7 day";
				break;
		}
		for ($i=1; $i <= $number_of_meetings; $i++) { 
			$this->Meeting->create();
			$data = array(
				'number' => $i,
				'date' => $d,
				'time' => $meeting_time,
				'summary' => __('Write your meeting summary here',true),
				'user_id' => $user_id,
				'pack_id' => $pack_id
			);
			$this->Meeting->save($data);			
			$d = date('Y-m-d',strtotime($per, strtotime($d)));
		}
	}

	public function createPayments($pack_id, $user_id, $start_date, $number_of_meetings, $meeting_price) {
		$this->Payment->create();
		$data = array(
			'number' => 1,
			'due_date' => $start_date,
			'due_amount' => $number_of_meetings * $meeting_price,
			'user_id' => $user_id,
			'pack_id' => $pack_id
		);
		$this->Payment->save($data);		
	}

}
