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
 * Joomla Framework class for interacting with a Linkedin API instance.
 *
 * @since       1.0
 * @deprecated  The joomla/linkedin package is deprecated
 */
class Linkedin
{
	/**
	 * Options for the Linkedin object.
	 *
	 * @var    array
	 * @since  1.0
	 */
	protected $options;

	/**
	 * The HTTP client object to use in sending HTTP requests.
	 *
	 * @var    Http
	 * @since  1.0
	 */
	protected $client;

	/**
	 * The OAuth client.
	 *
	 * @var    OAuth
	 * @since  1.0
	 */
	protected $oauth;

	/**
	 * Linkedin API object for people.
	 *
	 * @var    People
	 * @since  1.0
	 */
	protected $people;

	/**
	 * Linkedin API object for groups.
	 *
	 * @var    Groups
	 * @since  1.0
	 */
	protected $groups;

	/**
	 * Linkedin API object for companies.
	 *
	 * @var    Companies
	 * @since  1.0
	 */
	protected $companies;

	/**
	 * Linkedin API object for jobs.
	 *
	 * @var    Jobs
	 * @since  1.0
	 */
	protected $jobs;

	/**
	 * Linkedin API object for social stream.
	 *
	 * @var    Stream
	 * @since  1.0
	 */
	protected $stream;

	/**
	 * Linkedin API object for communications.
	 *
	 * @var    Communications
	 * @since  1.0
	 */
	protected $communications;

	/**
	 * Constructor.
	 *
	 * @param   OAuth  $oauth    The Linkedin OAuth client.
	 * @param   array  $options  Linkedin options array.
	 * @param   Http   $client   The HTTP client object.
	 *
	 * @since   1.0
	 */
	public function __construct(OAuth $oauth = null, $options = array(), Http $client = null)
	{
		$this->oauth   = $oauth;
		$this->options = $options;
		$this->client  = $client;

		// Setup the default API url if not already set.
		if (!isset($this->options['api.url']))
		{
			$this->options['api.url'] = 'https://api.linkedin.com';
		}
	}

	/**
	 * Magic method to lazily create API objects
	 *
	 * @param   string  $name  Name of property to retrieve
	 *
	 * @return  AbstractLinkedinObject  Linkedin API object (statuses, users, favorites, etc.).
	 *
	 * @since   1.0
	 * @throws  \InvalidArgumentException If $name is not a valid sub class.
	 */
	public function __get($name)
	{
		$class = __NAMESPACE__ . '\\' . ucfirst(strtolower($name));

		if (class_exists($class) && property_exists($this, $name))
		{
			if (isset($this->$name) == false)
			{
				$this->$name = new $class($this->options, $this->client, $this->oauth);
			}

			return $this->$name;
		}

		throw new \InvalidArgumentException(sprintf('Argument %s produced an invalid class name: %s', $name, $class));
	}

	/**
	 * Get an option from the Linkedin instance.
	 *
	 * @param   string  $key  The name of the option to get.
	 *
	 * @return  mixed  The option value.
	 *
	 * @since   1.0
	 */
	public function getOption($key)
	{
		return isset($this->options[$key]) ? $this->options[$key] : null;
	}

	/**
	 * Set an option for the Linkedin instance.
	 *
	 * @param   string  $key    The name of the option to set.
	 * @param   mixed   $value  The option value to set.
	 *
	 * @return  Linkedin  This object for method chaining.
	 *
	 * @since   1.0
	 */
	public function setOption($key, $value)
	{
		$this->options[$key] = $value;

		return $this;
	}
}
