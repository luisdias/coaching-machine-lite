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
 * Payment Model
 *
 * @property User $User
 * @property Pack $Pack
 */
class Payment extends AppModel {

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
					//'allowEmpty' => false,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
				'isValidPack'=> array(
					'rule' => array('isValidPack'),
					'message' => __('Pack does not belong to User',true),
				),
			),
			'due_amount' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => __('Due Amount is required',true),
					//'allowEmpty' => false,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
			),
			'due_date' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => __('Due Date is required',true),
					//'allowEmpty' => false,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
			),
			'number' => array(
				'numeric' => array(
					'rule' => 'numeric',
					'message' => __('Please enter only numbers',true),
					'allowEmpty' => false,
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
		),
		'Pack' => array(
			'className' => 'Pack',
			'foreignKey' => 'pack_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public function nextPaymentNumber($user_id = null, $pack_id = null) {
		
		$next = $this->find('all',array(
			'fields' => array('MAX(Payment.number) AS number'),
			'conditions' => array('Payment.user_id' => $user_id, 'Payment.pack_id' => $pack_id)			
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
}
