<?php
/**
 * @package     TjDashboard
 * @subpackage  renderer
 *
 * @author      Techjoomla <extensions@techjoomla.com>
 * @copyright   Copyright (C) 2009 - 2019 Techjoomla. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die('Restricted access');

/**
 * plugin of TJDashboardRendererTjdash
 *
 * @since  1.0.0
 */
class PlgTjdashboardRendererChartjs
{
	/**
	 * Get the widget JS files
	 *
	 * @return	Array JS files paths
	 *
	 * @since 	1.0.0
	 **/
	public function getJS()
	{
		$JS1 = Juri::root() . 'plugins/tjdashboardrenderer/chartjs/assets/js/moment.min.js';
		$JS2 = Juri::root() . 'plugins/tjdashboardrenderer/chartjs/assets/js/Chart.min.js';
		$JS3 = Juri::root() . 'plugins/tjdashboardrenderer/chartjs/assets/js/renderer.js';

		return array($JS1, $JS2, $JS3);
	}

	/**
	 * Get the widget CSS files
	 *
	 * @return	Array CSS files paths
	 *
	 * @since 	1.0.0
	 **/
	public function getCSS()
	{
		return array();
	}
}
