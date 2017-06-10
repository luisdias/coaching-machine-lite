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
 * ConfigWheelSlice Model
 *
 * @property ConfigWheelSliceGroup $ConfigWheelSliceGroup
 * @property ConfigWheel $ConfigWheel
 */
class ConfigWheelSlice extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';
	
    public $actsAs = array('Search.Searchable');

	public $filterArgs = array(
		'config_wheel_id' => array(
			'type' => 'like'
		),
		'config_wheel_slice_group_id' => array(
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
			'config_wheel_id' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => __('Wheel is required',true),
					//'allowEmpty' => false,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
			),	
			'config_wheel_slice_group_id' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => __('Wheel Slice Group is required',true),
					//'allowEmpty' => false,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
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
			'color' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => __('Color is required',true),
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
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'ConfigWheelSliceGroup' => array(
			'className' => 'ConfigWheelSliceGroup',
			'foreignKey' => 'config_wheel_slice_group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ConfigWheel' => array(
			'className' => 'ConfigWheel',
			'foreignKey' => 'config_wheel_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),        
	);
}
