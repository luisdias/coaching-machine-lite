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
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
/**
 * User Model
 * 12e291762086b25aab11f37cd978bdfa8a5ce070219866e2edd234a35da0991a
 * @property Pack $Pack
 * @property Payment $Payment
 * @property Session $Session
 * @property Task $Task
 * @property Wheel $Wheel
 */
class User extends AppModel {

    public $actsAs = array(
        'Upload.Upload' => array(
            'photo'
        ),
		'Search.Searchable'
    );

	public $filterArgs = array(
		'name' => array(
			'type' => 'like'
		),
	);		
	
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
 
	public function __construct($id = false , $table = null , $ds = null) {
		parent::__construct($id, $table, $ds);
		$this->validate = array(
			'photo' => array(
				'isBelowMaxSize' => array(
				'rule' => array('isBelowMaxSize', 50000, false),
				'message' => __('File is larger than the maximum filesize - 500Kb'),
				'allowEmpty' => true,
				'required' => false,				
				),
				'isBelowMaxHeight' => array(
				'rule' => array('isBelowMaxHeight', 160, false),
				'message' => __('File is below the maximum height - 160px'),
				'allowEmpty' => true,
				'required' => false,				
				)
			),		
			'role' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => __('Role is required',true),
					//'allowEmpty' => false,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
				'checkAdminOnCreate' => array(
					'rule' => array('checkAdminOnCreate'),
					'message' => __('There can be only one coach/administrator',true),
					//'allowEmpty' => false,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
				'checkAdminOnUpdate' => array(
					'rule' => array('checkAdminOnUpdate'),
					'message' => __('There can be only one coach/administrator',true),
					//'allowEmpty' => false,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					'on' => 'update', // Limit validation to 'create' or 'update' operations
				),				
			),			
			'name' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => __('Name is required',true),
					//'allowEmpty' => false,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
			),
			'email' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => __('Email is required',true),
				),
			),
			'username' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => __('Username is required',true),
				),
                'unique' => array(
					'rule' => array('isUnique'),
					'message' => __('Username already exists',true),
				),
			),
			'password' => array(
				'minLengthOnCreate' => array(
					'allowEmpty'    => false,
					'message'       => __('Must be at least 8 characters',true),
					'on'            => 'create',
					'rule'          => array('minLength', 8)
				),
				'minLengthOnUpdate' => array(
					'allowEmpty'    => true,
					'message'       => __('Must be at least 8 characters',true),
					'on'            => 'update',
					'rule'          => array('minLength', 8)
				)
			),
			'password_confirm'  => array(
				'passwordsMatchOnCreate' => array(
					'allowEmpty'    => false,
					'message'       => __('Passwords don\'t match',true),
					'on'            => 'create',
					'rule'          => 'checkPasswords'
				),
				'passwordsMatchOnUpdate' => array(
					'allowEmpty'    => true,
					'message'       => __('Passwords don\'t match',true),
					'on'            => 'update',
					'rule'          => 'checkPasswords'
				)		
			),
            'facebook' => array(
                'url' => array(
                    'rule' => array('url'),
                    'allowEmpty'    => true,
					'message'       => __('Insert a valid URL',true),                    
                )
            ),
            'linkedin' => array(
                'url' => array(
                    'rule' => array('url'),
                    'allowEmpty'    => true,
					'message'       => __('Insert a valid URL',true),                    
                )                
            ),
            'twitter' => array(
                'url' => array(
                    'rule' => array('url'),
                    'allowEmpty'    => true,
					'message'       => __('Insert a valid URL',true),                    
                )                
            ),
            'site' => array(
                'url' => array(
                    'rule' => array('url'),
                    'allowEmpty'    => true,
					'message'       => __('Insert a valid URL',true),                    
                )            
            ),
		);
	}


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Pack' => array(
			'className' => 'Pack',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Payment' => array(
			'className' => 'Payment',
			'foreignKey' => 'user_id',
			'dependent' => false,
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
			'foreignKey' => 'user_id',
			'dependent' => false,
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
			'foreignKey' => 'user_id',
			'dependent' => false,
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
			'foreignKey' => 'user_id',
			'dependent' => false,
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
			'foreignKey' => 'user_id',
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

    public function checkPasswords() {
		if ( empty($this->data[$this->alias]['password']) && empty($this->data[$this->alias]['password_confirm']) ) {
			return true;
		} else {
			return $this->data[$this->alias]['password'] === $this->data[$this->alias]['password_confirm'];
		}        
    } 	

	public function beforeValidate($options = array()) {
        if(!empty($this->data[$this->alias]['password']) && isset($this->data[$this->alias]['password_confirm']))        
            $this->validator()->getField('password_confirm')->getRule('passwordsMatchOnUpdate')->allowEmpty = false;
        return true;
    }
	
    public function beforeSave($options = array()) {
		parent::beforeSave($options = array());
        if (!empty($this->data[$this->alias]['password'])) {
            $passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        } else {
			unset($this->data[$this->alias]['password']);
		}
        return true;
    }

	public function checkAdminOnCreate() {
		$role = $this->data[$this->alias]['role'];
		if ( $role == "Coach") {
			$user = $this->find('all',array(
				'conditions' => array('User.role' => "Coach")
			));
			if( !empty($user) ) {
				return false;
			} else {
				return true;
			}			
		} else {
			return true;
		}
	}
	
	public function checkAdminOnUpdate() {
		$user_id = $this->data[$this->alias]['id'];
		$role = $this->data[$this->alias]['role'];
		if ( $role == "Coach") {
			$user = $this->find('all',array(
				'conditions' => array('User.role' => "Coach",'User.id != ' => $user_id)
			));
			if( !empty($user) ) {
				return false;
			} else {
				return true;
			}			
		} else {
			return true;
		}
	}
	
	public function beforeDelete($cascade = true) {	
		$user = $this->findById($this->id);
		if ( $user['User']['role'] == "Coach") { 
			return false;
		}
		return true;
	}
	
}
