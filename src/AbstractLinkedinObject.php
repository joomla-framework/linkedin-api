<?php
/**
 * Part of the Joomla Framework Linkedin Package
 *
 * @copyright  Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Joomla\Linkedin;

use Joomla\Http\Http;

/**
 * Linkedin API object class for the Joomla Framework.
 *
 * @since       1.2.0
 * @deprecated  The joomla/linkedin package is deprecated
 */
abstract class AbstractLinkedinObject
{
	/**
	 * Options for the Linkedin object.
	 *
	 * @var    array
	 * @since  1.2.0
	 */
	protected $options;

	/**
	 * The HTTP client object to use in sending HTTP requests.
	 *
	 * @var    Http
	 * @since  1.2.0
	 */
	protected $client;

	/**
	 * The OAuth client.
	 *
	 * @var    OAuth
	 * @since  1.2.0
	 */
	protected $oauth;

	/**
	 * Constructor.
	 *
	 * @param   array  $options  Linkedin options array.
	 * @param   Http   $client   The HTTP client object.
	 * @param   OAuth  $oauth    The OAuth client.
	 *
	 * @since   1.2.0
	 */
	public function __construct($options = array(), Http $client = null, OAuth $oauth = null)
	{
		$this->options = $options;
		$this->client  = isset($client) ? $client : new Http($this->options);
		$this->oauth   = $oauth;
	}

	/**
	 * Method to convert boolean to string.
	 *
	 * @param   boolean  $bool  The boolean value to convert.
	 *
	 * @return  string  String with the converted boolean.
	 *
	 * @since   1.2.0
	 */
	public function booleanToString($bool)
	{
		if ($bool)
		{
			return 'true';
		}

		return 'false';
	}

	/**
	 * Get an option from the Object instance.
	 *
	 * @param   string  $key  The name of the option to get.
	 *
	 * @return  mixed  The option value.
	 *
	 * @since   1.2.0
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
	 * @since   1.2.0
	 */
	public function setOption($key, $value)
	{
		$this->options[$key] = $value;

		return $this;
	}
}
