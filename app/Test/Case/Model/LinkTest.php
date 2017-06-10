<?php
App::uses('Link', 'Model');

/**
 * Link Test Case
 */
class LinkTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.link',
		'app.pack',
		'app.user',
		'app.payment',
		'app.meeting',
		'app.task',
		'app.action',
		'app.wheel',
		'app.config_wheel',
		'app.config_wheel_slice',
		'app.config_wheel_slice_group',
		'app.wheel_slice'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Link = ClassRegistry::init('Link');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Link);

		parent::tearDown();
	}

}
