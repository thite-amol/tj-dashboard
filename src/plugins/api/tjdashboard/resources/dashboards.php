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

/**
 * Tjdashboard API dashboards class
 *
 * @since  1.0.0
 */
class TjdashboardApiResourceDashboards extends ApiResource
{
	/**
	 * Function post for dashboards record.
	 *
	 * @return boolean
	 */
	public function post()
	{
		$dashboardmodel = TjdashboardFactory::model("Dashboards");
		$dashboardData = $dashboardmodel->getItems();
		$this->plugin->setResponse($dashboardData);
	}
}
