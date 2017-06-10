<?php
App::uses('Survey', 'Model');

/**
 * Survey Test Case
 */
class SurveyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.survey',
		'app.config_survey',
		'app.config_question_group',
		'app.config_question',
		'app.config_answer',
		'app.user',
		'app.pack',
		'app.payment',
		'app.meeting',
		'app.task',
		'app.action',
		'app.wheel',
		'app.config_wheel',
		'app.config_wheel_slice',
		'app.config_wheel_slice_group',
		'app.wheel_slice',
		'app.answer'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Survey = ClassRegistry::init('Survey');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Survey);

		parent::tearDown();
	}

}
