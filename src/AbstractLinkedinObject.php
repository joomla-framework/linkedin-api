<?php
/**
 * Part of the Joomla Framework Linkedin Package
 *
 * @copyright  Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Joomla\Linkedin;

use Joomla\Http\Http;

/**
 * Linkedin API object class for the Joomla Framework.
 *
 * @since  __DEPLOY_VERSION__
 */
abstract class AbstractLinkedinObject
{
	/**
	 * Options for the Linkedin object.
	 *
	 * @var    array
	 * @since  __DEPLOY_VERSION__
	 */
	protected $options;

	/**
	 * The HTTP client object to use in sending HTTP requests.
	 *
	 * @var    Http
	 * @since  __DEPLOY_VERSION__
	 */
	protected $client;

	/**
	 * The OAuth client.
	 *
	 * @var    OAuth
	 * @since  __DEPLOY_VERSION__
	 */
	protected $oauth;

	/**
	 * Constructor.
	 *
	 * @param   array  $options  Linkedin options array.
	 * @param   Http   $client   The HTTP client object.
	 * @param   OAuth  $oauth    The OAuth client.
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	public function __construct($options = array(), Http $client = null, OAuth $oauth = null)
	{
		$this->options = $options;
		$this->client = isset($client) ? $client : new Http($this->options);
		$this->oauth = $oauth;
	}

	/**
	 * Method to convert boolean to string.
	 *
	 * @param   boolean  $bool  The boolean value to convert.
	 *
	 * @return  string  String with the converted boolean.
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	public function booleanToString($bool)
	{
		if ($bool)
		{
			return 'true';
		}
		else
		{
			return 'false';
		}
	}

	/**
	 * Get an option from the Object instance.
	 *
	 * @param   string  $key  The name of the option to get.
	 *
	 * @return  mixed  The option value.
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	public function getOption($key)
	{
		return isset($this->options[$key]) ? $this->options[$key] : null;
	}

	/**
	 * Set an option for the Object instance.
	 *
	 * @param   string  $key    The name of the option to set.
	 * @param   mixed   $value  The option value to set.
	 *
	 * @return  AbstractLinkedinObject  This object for method chaining.
	 *
	 * @since   __DEPLOY_VERSION__
	 */
	public function setOption($key, $value)
	{
		$this->options[$key] = $value;

		return $this;
	}
}
