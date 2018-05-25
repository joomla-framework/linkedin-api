<?php
/**
 * @copyright  Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Joomla\Linkedin\Tests;

/**
 * Test class for JLinkedinObject.
 *
 * @since  1.0
 */
class ObjectTest extends LinkedinTestCase
{
	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 *
	 * @access protected
	 *
	 * @return void
	 */
	protected function setUp()
	{
		parent::setUp();

		$this->object = $this->getMockForAbstractClass('Joomla\\Linkedin\\AbstractLinkedinObject');
	}

	/**
	 * Tests the setOption method
	 *
	 * @return void
	 *
	 * @since 1.0
	 */
	public function testSetOption()
	{
		$this->object->setOption('api.url', 'https://example.com/settest');

		$this->assertSame(
			$this->object->getOption('api.url'),
			'https://example.com/settest'
		);
	}
}
