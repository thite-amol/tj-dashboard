<?php
/**
 * @package    Com_Tjdashboard
 * @author     Techjoomla <extensions@techjoomla.com>
 * @copyright  2017 Techjoomla
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\Utilities\ArrayHelper;

/**
 * The widget controller
 *
 * @since  1.6
 */
class TjDashboardControllerWidget extends JControllerForm
{
	/**
	 * Function to get all the respective renderers for given data source
	 *
	 * @return  object  object
	 */
	public function getSupportedRenderers()
	{
		try
		{
			$app     = JFactory::getApplication();
			$jinput  = $app->input;
			$formData   = $jinput->post->get('pluginName', '', 'string');
			$dataPlugin = explode('.', $formData);
			$pluginFolder = $dataPlugin[0] . '/' . $dataPlugin[0];
			$pluginFileName = $dataPlugin[1];
			require_once JPATH_PLUGINS . '/tjdashboardsource/' . $pluginFolder . '/' . $pluginFileName . '.php';
			$className = ucfirst($dataPlugin[0]) . ucfirst($pluginFileName) . 'Datasource';
			$dataSourceObject = new $className;
			$renderers = $dataSourceObject->getSupportedRenderers();
			echo new JResponseJson($renderers);
			jexit();
		}
		catch (Exception $e)
		{
			echo new JResponseJson($e);
		}
	}
}
