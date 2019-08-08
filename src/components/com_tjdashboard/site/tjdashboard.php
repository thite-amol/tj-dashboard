<?php
/**
 * @package     TjDashboard
 * @subpackage  com_tjdashboard
 *
 * @author      Techjoomla <extensions@techjoomla.com>
 * @copyright   Copyright (C) 2009 - 2019 Techjoomla. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die;

// Include dependancies
jimport('joomla.application.component.controller');

JLoader::registerPrefix('Tjdashboard', JPATH_COMPONENT);
JLoader::register('TjdashboardController', JPATH_COMPONENT . '/controller.php');

$document = JFactory::getDocument();
$script  = 'const root_url = "' . Juri::root() . '";';
$document->addScriptDeclaration($script, 'text/javascript');

// Get Tjdashboard params
$tjdashboardparams = JComponentHelper::getParams('com_tjdashboard');

if ($tjdashboardparams->get('load_bootstrap') == 1)
{
	// Load bootstrap CSS and JS.
	JHtml::stylesheet('media/techjoomla_strapper/bs3/css/bootstrap.css');

	JHtml::_('bootstrap.framework');
}

define('COM_TJDASHBOARD_WRAPPER_DIV', 'tjBs3');

// Execute the task.
$controller = JControllerLegacy::getInstance('Tjdashboard');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
