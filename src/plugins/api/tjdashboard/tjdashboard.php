<?php
/**
 * @package     TjDashboard
 * @subpackage  api.tjdashboard
 *
 * @author      Techjoomla <extensions@techjoomla.com>
 * @copyright   Copyright (C) 2009 - 2019 Techjoomla. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

// No direct access.
defined('_JEXEC') or die;

jimport('joomla.plugin.plugin');
JLoader::import('components.com_tjdashboard.includes.tjdashboard', JPATH_ADMINISTRATOR);
JLoader::import('components.com_tjdashboard.libraries.dashboard', JPATH_ADMINISTRATOR);
JLoader::import('components.com_tjdashboard.libraries.widget', JPATH_ADMINISTRATOR);

/**
 * Tjdashboard API plugin
 *
 * @since  1.0.0
 */
class PlgAPITjdashboard extends ApiPlugin
{
	/**
	 * Constructor
	 *
	 * @param   STRING  &$subject  subject
	 * @param   array   $config    config
	 *
	 * @since 1.0.0
	 */
	public function __construct(&$subject, $config = array())
	{
		parent::__construct($subject, $config = array());

		// Set resource path
		ApiResource::addIncludePath(dirname(__FILE__) . '/resources');

		// Load language files
		$lang = JFactory::getLanguage();
		$lang->load('plg_api_tjdashboard', JPATH_ADMINISTRATOR, '', true);

		// Set the resource to be public
		$this->setResourceAccess('widget', 'public', 'get');
		$this->setResourceAccess('dashboard', 'public', 'get');
	}
}
