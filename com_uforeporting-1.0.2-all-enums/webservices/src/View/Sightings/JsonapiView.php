<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Uforeporting
 * @author      Claude.ai, Eric D. Martin & Open.Ai <edm@252edmusmc.xyz>
 * @copyright   Claude.ai, Eric D. Martin & Open.Ai
 * @license    Open Source, Paid Support
 */

namespace Uforresporting\Component\Uforeporting\Api\View\Sightings;

\defined('_JEXEC') or die;

use Joomla\CMS\MVC\View\JsonApiView as BaseApiView;

/**
 * The Sightings view
 *
 * @since  1.0.0
 */
class JsonApiView extends BaseApiView
{
	/**
	 * The fields to render item in the documents
	 *
	 * @var    array
	 * @since  1.0.0
	 */
	protected $fieldsToRenderItem = [
		'id', 
		'session_id', 
		'occurred_at', 
		'--', 
		'obs_mod', 
		'obs_substrate', 
		'obs_kin', 
		'obs_sens', 
		'obs_occ', 
		'obs_veh', 
		'--', 
		'obj_mod', 
		'obj_substrate', 
		'behavior_code', 
		'speed_mod', 
		'shape_code', 
		'size_mod', 
		'--', 
		'confidence', 
		'--', 
		'longitude', 
		'elevation_m', 
		'alt_ft', 
		'depth_m', 
		'flight_level', 
		'velocity_kmh', 
		'accel_g', 
		'--', 
		'pattern_hash', 
		'--', 
		'created_at', 
		'updated_at', 
		'--', 
		''')', 
		''')', 
		''')', 
		''')', 
		'2}$'', 
		'ordering', 
		'state', 
		'created_by', 
	];

	/**
	 * The fields to render items in the documents
	 *
	 * @var    array
	 * @since  1.0.0
	 */
	protected $fieldsToRenderList = [
		'id', 
		'session_id', 
		'occurred_at', 
		'--', 
		'obs_mod', 
		'obs_substrate', 
		'obs_kin', 
		'obs_sens', 
		'obs_occ', 
		'obs_veh', 
		'--', 
		'obj_mod', 
		'obj_substrate', 
		'behavior_code', 
		'speed_mod', 
		'shape_code', 
		'size_mod', 
		'--', 
		'confidence', 
		'--', 
		'longitude', 
		'elevation_m', 
		'alt_ft', 
		'depth_m', 
		'flight_level', 
		'velocity_kmh', 
		'accel_g', 
		'--', 
		'pattern_hash', 
		'--', 
		'created_at', 
		'updated_at', 
		'--', 
		''')', 
		''')', 
		''')', 
		''')', 
		'2}$'', 
		'ordering', 
		'state', 
		'created_by', 
	];
}