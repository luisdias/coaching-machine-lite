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
 * Survey Model
 *
 * @property ConfigSurvey $ConfigSurvey
 * @property User $User
 * @property Pack $Pack
 * @property Answer $Answer
 * @property ConfigQuestionGroup $ConfigQuestionGroup
 * @property ConfigQuestion $ConfigQuestion
 */
class Survey extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';
	
    public $actsAs = array('Search.Searchable');

	public $filterArgs = array(
		'pack_id' => array(
			'type' => 'like'
		),
		'user_id' => array(
			'type' => 'like'
		),		
	);
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
		'config_survey_id' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => __('Survey is required',true),
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
		'ConfigSurvey' => array(
			'className' => 'ConfigSurvey',
			'foreignKey' => 'config_survey_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
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
		'Answer' => array(
			'className' => 'Answer',
			'foreignKey' => 'survey_id',
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
		'ConfigQuestionGroup' => array(
			'className' => 'ConfigQuestionGroup',
			'foreignKey' => 'survey_id',
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
		'ConfigQuestion' => array(
			'className' => 'ConfigQuestion',
			'foreignKey' => 'survey_id',
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
