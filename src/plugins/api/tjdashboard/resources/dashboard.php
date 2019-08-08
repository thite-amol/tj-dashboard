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
 * Tjdashboard API dashboard class
 *
 * @since  1.0.0
 */
class TjdashboardApiResourceDashboard extends ApiResource
{
	/**
	 * Function save dashboard.
	 *
	 * @return boolean
	 */
	public function post()
	{
		$app            = JFactory::getApplication();
		$jinput         = $app->input;
		$formData       = $jinput->post->getArray();
		$dashboardId    = $jinput->getInt('id');
		$dashboard      = TjdashboardDashboard::getInstance($dashboardId);
		$responceObject = new stdclass;

		if ($dashboard->bind($formData))
		{
			if ($dashboard->save())
			{
				$responceObject->data   = $dashboard->dashboard_id;
				$responceObject->status = JText::_("COM_TJDASHBOARD_DASHBOARD_DATA_SAVED_SUCCESSFULLY");
			}
			else
			{
				ApiError::raiseError(400, JText::_($dashboard->getError()));
			}
		}
		else
		{
			ApiError::raiseError(400, JText::_($dashboard->getError()));
		}

		$this->plugin->setResponse(/** @scrutinizer ignore-type */ $responceObject);
	}

	/**
	 * Function get dashboard data.
	 *
	 * @return boolean
	 */
	public function get()
	{
		$app         = JFactory::getApplication();
		$jinput      = $app->input;

		$dashboardId = $jinput->getInt('id');
		$dashboard = new stdClass;

		if (!empty($dashboardId))
		{
			$dashboard   = TjdashboardDashboard::getInstance($dashboardId);
		}
		else
		{
			ApiError::raiseError(400, JText::_("COM_TJDASHBOARD_DASHBOARD_ID_NOT_SET"));
		}

		$this->plugin->setResponse($dashboard);
	}
}
