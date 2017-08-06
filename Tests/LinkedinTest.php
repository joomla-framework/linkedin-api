<?php
/**
 * @copyright  Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Joomla\Linkedin\Tests;

use Joomla\Linkedin\Linkedin;

/**
 * Test class for Linkedin.
 *
 * @since  1.0
 */
class LinkedinTest extends LinkedinTestCase
{
	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 *
	 * @return void
	 */
	protected function setUp()
	{
		parent::setUp();

		$this->object = new Linkedin($this->oauth, $this->options, $this->client);
	}

	/**
	 * Tests the magic __get method - people
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function test__GetPeople()
	{
		$this->assertThat(
			$this->object->people,
			$this->isInstanceOf('Joomla\\Linkedin\\People')
		);
	}

	/**
	 * Tests the magic __get method - groups
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function test__GetGroups()
	{
		$this->assertThat(
			$this->object->groups,
			$this->isInstanceOf('Joomla\\Linkedin\\Groups')
		);
	}

	/**
	 * Tests the magic __get method - companies
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function test__GetCompanies()
	{
		$this->assertThat(
			$this->object->companies,
			$this->isInstanceOf('Joomla\\Linkedin\\Companies')
		);
	}

	/**
	 * Tests the magic __get method - jobs
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function test__GetJobs()
	{
		$this->assertThat(
			$this->object->jobs,
			$this->isInstanceOf('Joomla\\Linkedin\\Jobs')
		);
	}

	/**
	 * Tests the magic __get method - stream
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function test__GetStream()
	{
		$this->assertThat(
			$this->object->stream,
			$this->isInstanceOf('Joomla\\Linkedin\\Stream')
		);
	}

	/**
	 * Tests the magic __get method - communications
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function test__GetCommunications()
	{
		$this->assertThat(
			$this->object->communications,
			$this->isInstanceOf('Joomla\\Linkedin\\Communications')
		);
	}

	/**
	 * Tests the magic __get method - other (non existant)
	 *
	 * @return  void
	 *
	 * @since              1.0
	 * @expectedException  \InvalidArgumentException
	 */
	public function test__GetOther()
	{
		$tmp = $this->object->other;
	}

	/**
	 * Tests the setOption and getOption methods
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function testSetAndGetOption()
	{
		$this->object->setOption('api.url', 'https://example.com/settest');

		$this->assertSame(
			$this->object->getOption('api.url'),
			'https://example.com/settest'
		);
	}
}
