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

$document = JFactory::getDocument();
$script  = 'const root_url = "' . Juri::root() . '";';
$document->addScriptDeclaration($script, 'text/javascript');

JLoader::registerPrefix('Tjdashboard', JPATH_ADMINISTRATOR);
JLoader::register('TjdashboardController', JPATH_ADMINISTRATOR . '/controller.php');

// Execute the task.
$controller = JControllerLegacy::getInstance('Tjdashboard');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
