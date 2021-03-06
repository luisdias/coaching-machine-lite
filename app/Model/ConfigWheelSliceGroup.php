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
 * ConfigWheelSliceGroup Model
 *
 * @property ConfigWheel $ConfigWheel
 * @property ConfigWheelSlice $ConfigWheelSlice
 */
class ConfigWheelSliceGroup extends AppModel {

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
			'position' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => __('Position is required',true),
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
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ConfigWheelSlice' => array(
			'className' => 'ConfigWheelSlice',
			'foreignKey' => 'config_wheel_slice_group_id',
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
    
	public $belongsTo = array(
		'ConfigWheel' => array(
			'className' => 'ConfigWheel',
			'foreignKey' => 'config_wheel_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);    

}
