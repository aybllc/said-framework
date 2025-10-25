<?php
/**
 * @package    Com_Uforeporting
 * @author      Claude.ai, Eric D. Martin & Open.Ai <edm@252edmusmc.xyz>
 * @copyright   Claude.ai, Eric D. Martin & Open.Ai
 * @license    Open Source, Paid Support
 */

defined('_JEXEC') or die;

use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Router\ApiRouter;

/**
 * Web Services adapter for uforeporting.
 *
 * @since  1.0.0
 */
class PlgWebservicesUforeporting extends CMSPlugin
{
	public function onBeforeApiRoute(&$router)
	{
		
		$router->createCRUDRoutes('v1/uforeporting/domains', 'domains', ['component' => 'com_uforeporting']);
		$router->createCRUDRoutes('v1/uforeporting/behaviors', 'behaviors', ['component' => 'com_uforeporting']);
		$router->createCRUDRoutes('v1/uforeporting/environments', 'environments', ['component' => 'com_uforeporting']);
		$router->createCRUDRoutes('v1/uforeporting/kinematics', 'kinematics', ['component' => 'com_uforeporting']);
		$router->createCRUDRoutes('v1/uforeporting/vehicles', 'vehicles', ['component' => 'com_uforeporting']);
		$router->createCRUDRoutes('v1/uforeporting/pairs', 'pairs', ['component' => 'com_uforeporting']);
		$router->createCRUDRoutes('v1/uforeporting/sightings', 'sightings', ['component' => 'com_uforeporting']);
		$router->createCRUDRoutes('v1/uforeporting/medias', 'medias', ['component' => 'com_uforeporting']);
		$router->createCRUDRoutes('v1/uforeporting/witnesses', 'witnesses', ['component' => 'com_uforeporting']);
	}
}
