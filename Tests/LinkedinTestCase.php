<?php
/**
 * @copyright  Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Joomla\Linkedin\Tests;

use Joomla\Application\AbstractWebApplication;
use Joomla\Http\Http;
use Joomla\Input\Input;
use Joomla\Linkedin\OAuth;
use Joomla\Registry\Registry;
use PHPUnit\Framework\TestCase;

/**
 * Test case for Linkedin.
 *
 * @since  1.0
 */
class LinkedinTestCase extends TestCase
{
	/**
	 * @var    Registry  Options for the Linkedin object.
	 * @since  1.0
	 */
	protected $options;

	/**
	 * @var    Http  Mock http object.
	 * @since  1.0
	 */
	protected $client;

	/**
	 * @var    Input The input object to use in retrieving GET/POST data.
	 * @since  1.0
	 */
	protected $input;

	/**
	 * @var    AbstractWebApplication|\PHPUnit_Framework_MockObject_MockObject The application object to send HTTP headers for redirects.
	 * @since  1.0
	 */
	protected $application;

	/**
	 * @var    OAuth  Authentication object for the Twitter object.
	 * @since  1.0
	 */
	protected $oauth;

	/**
	 * @var    Linkedin  Object under test (companies, groups, jobs ..).
	 * @since  1.0
	 */
	protected $object;

	/**
	 * @var    string  Sample JSON string.
	 * @since  1.0
	 */
	protected $sampleString = '{"a":1,"b":2,"c":3,"d":4,"e":5}';

	/**
	 * @var    string  Sample JSON error message.
	 * @since  1.0
	 */
	protected $errorString = '{"errorCode":401, "message": "Generic error"}';

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 *
	 * @return void
	 */
	protected function setUp()
	{
		parent::setUp();

		$_SERVER['HTTP_HOST'] = 'example.com';
		$_SERVER['HTTP_USER_AGENT'] = 'Mozilla/5.0';
		$_SERVER['REQUEST_URI'] = '/index.php';
		$_SERVER['SCRIPT_NAME'] = '/index.php';

		$key = "app_key";
		$secret = "app_secret";
		$my_url = "http://127.0.0.1/linkedin_test.php";

		$this->options = new Registry;
		$this->input = new Input;
		$this->client = $this->getMockBuilder('\\Joomla\\Http\\Http')->getMock();
		$this->application = $this->getMockForAbstractClass('\\Joomla\\Application\\AbstractWebApplication');
		$this->oauth = new OAuth($this->application, $this->client, $this->input, $this->options);
		$this->oauth->setToken(array('key' => $key, 'secret' => $secret));

		$this->options->set('consumer_key', $key);
		$this->options->set('consumer_secret', $secret);
		$this->options->set('callback', $my_url);
	}
}
