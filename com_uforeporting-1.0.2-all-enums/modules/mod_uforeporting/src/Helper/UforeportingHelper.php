<?php

/**
 * @version     CVS: 1.0.0
 * @package     com_uforeporting
 * @subpackage  mod_uforeporting
 * @author       Claude.ai, Eric D. Martin & Open.Ai <edm@252edmusmc.xyz>
 * @copyright    Claude.ai, Eric D. Martin & Open.Ai
 * @license     Open Source, Paid Support
 */

namespace Uforresporting\Module\Uforeporting\Site\Helper;

\defined('_JEXEC') or die;

use \Joomla\CMS\Factory;
use \Joomla\CMS\Language\Text;
use \Joomla\CMS\Language\Language;
use \Joomla\CMS\User\UserFactoryInterface;

/**
 * Helper for mod_uforeporting
 *
 * @package     com_uforeporting
 * @subpackage  mod_uforeporting
 * @since       1.0.0
 */
Class UforeportingHelper
{
	/**
	 * Retrieve component items
	 *
	 * @param   Joomla\Registry\Registry &$params module parameters
	 *
	 * @return array Array with all the elements
	 *
	 * @throws Exception
	 */
	public static function getList(&$params)
	{
		$app   = Factory::getApplication();
		$db    = Factory::getContainer()->get('DatabaseDriver');
		$query = $db->getQuery(true);

		$tableField = explode(':', $params->get('field'));
		$table_name = !empty($tableField[0]) ? $tableField[0] : '';

		/* @var $params Joomla\Registry\Registry */
		$query
			->select('*')
			->from($table_name)
			->where('state = 1');

		$db->setQuery($query, $app->input->getInt('offset', (int) $params->get('offset')), $app->input->getInt('limit', (int) $params->get('limit')));
		$rows = $db->loadObjectList();

		return $rows;
	}

	/**
	 * Retrieve component items
	 *
	 * @param   Joomla\Registry\Registry &$params module parameters
	 *
	 * @return mixed stdClass object if the item was found, null otherwise
	 */
	public static function getItem(&$params)
	{
		$db    = Factory::getContainer()->get('DatabaseDriver');
		$query = $db->getQuery(true);

		/* @var $params Joomla\Registry\Registry */
		$query
			->select('*')
			->from($params->get('item_table'))
			->where('id = ' . intval($params->get('item_id')));

		$db->setQuery($query);
		$element = $db->loadObject();

		return $element;
	}

	/**
	 * Render element
	 *
	 * @param   Joomla\Registry\Registry $table_name  Table name
	 * @param   string                   $field_name  Field name
	 * @param   string                   $field_value Field value
	 *
	 * @return string
	 */
	public static function renderElement($table_name, $field_name, $field_value)
	{
		$result = '';
		
		if(strpos($field_name, ':'))
		{
			$tableField = explode(':', $field_name);
			$table_name = !empty($tableField[0]) ? $tableField[0] : '';
			$field_name = !empty($tableField[1]) ? $tableField[1] : '';
		}
		
		switch ($table_name)
		{
			
		case '#__ommp_domains':
		switch($field_name){
		case 'code':
		$result = $field_value;
		break;
		case 'name':
		$result = $field_value;
		break;
		case 'description':
		$result = $field_value;
		break;
		case 'minus_range':
		$result = $field_value;
		break;
		case 'equal_range':
		$result = $field_value;
		break;
		case 'plus_range':
		$result = $field_value;
		break;
		case 'id':
		$result = $field_value;
		break;
		case 'created_by':
		$container = \Joomla\CMS\Factory::getContainer();
		$userFactory = $container->get(UserFactoryInterface::class);
		$user = $userFactory->loadUserById($field_value);
		$result = $user->name;
		break;
		}
		break;
		case '#__ommp_behaviors':
		switch($field_name){
		case 'behavior_code':
		$result = $field_value;
		break;
		case 'behavior_name':
		$result = $field_value;
		break;
		case 'behavior_description':
		$result = $field_value;
		break;
		case 'id':
		$result = $field_value;
		break;
		case 'created_by':
		$container = \Joomla\CMS\Factory::getContainer();
		$userFactory = $container->get(UserFactoryInterface::class);
		$user = $userFactory->loadUserById($field_value);
		$result = $user->name;
		break;
		}
		break;
		case '#__ommp_environment':
		switch($field_name){
		case 'env_code':
		$result = $field_value;
		break;
		case 'env_name':
		$result = $field_value;
		break;
		case 'env_description':
		$result = $field_value;
		break;
		case 'id':
		$result = $field_value;
		break;
		case 'created_by':
		$container = \Joomla\CMS\Factory::getContainer();
		$userFactory = $container->get(UserFactoryInterface::class);
		$user = $userFactory->loadUserById($field_value);
		$result = $user->name;
		break;
		}
		break;
		case '#__ommp_observer_kinematics':
		switch($field_name){
		case 'code':
		$result = $field_value;
		break;
		case 'name':
		$result = $field_value;
		break;
		case 'definition':
		$result = $field_value;
		break;
		case 'id':
		$result = $field_value;
		break;
		case 'created_by':
		$container = \Joomla\CMS\Factory::getContainer();
		$userFactory = $container->get(UserFactoryInterface::class);
		$user = $userFactory->loadUserById($field_value);
		$result = $user->name;
		break;
		}
		break;
		case '#__ommp_observer_vehicle':
		switch($field_name){
		case 'code':
		$result = $field_value;
		break;
		case 'name':
		$result = $field_value;
		break;
		case 'definition':
		$result = $field_value;
		break;
		case 'id':
		$result = $field_value;
		break;
		case 'created_by':
		$container = \Joomla\CMS\Factory::getContainer();
		$userFactory = $container->get(UserFactoryInterface::class);
		$user = $userFactory->loadUserById($field_value);
		$result = $user->name;
		break;
		}
		break;
		case '#__ommp_invalid_pairs':
		switch($field_name){
		case 'observer_domain':
		$result = $field_value;
		break;
		case 'object_domain':
		$result = $field_value;
		break;
		case 'reason':
		$result = $field_value;
		break;
		case 'id':
		$result = $field_value;
		break;
		case 'created_by':
		$container = \Joomla\CMS\Factory::getContainer();
		$userFactory = $container->get(UserFactoryInterface::class);
		$user = $userFactory->loadUserById($field_value);
		$result = $user->name;
		break;
		}
		break;
		case '#__ommp_sightings':
		switch($field_name){
		case 'id':
		$result = $field_value;
		break;
		case 'session_id':
		$result = $field_value;
		break;
		case 'occurred_at':
		$result = $field_value;
		break;
		case '--':
		$result = $field_value;
		break;
		case 'obs_mod':
		$result = $field_value;
		break;
		case 'obs_substrate':
		$result = $field_value;
		break;
		case 'obs_kin':
		$result = $field_value;
		break;
		case 'obs_sens':
		$result = $field_value;
		break;
		case 'obs_occ':
		$result = $field_value;
		break;
		case 'obs_veh':
		$result = $field_value;
		break;
		case '--':
		$result = $field_value;
		break;
		case 'obj_mod':
		$result = $field_value;
		break;
		case 'obj_substrate':
		$result = $field_value;
		break;
		case 'behavior_code':
		$result = $field_value;
		break;
		case 'speed_mod':
		$result = $field_value;
		break;
		case 'shape_code':
		$result = $field_value;
		break;
		case 'size_mod':
		$result = $field_value;
		break;
		case '--':
		$result = $field_value;
		break;
		case 'confidence':
		$result = $field_value;
		break;
		case '--':
		$result = $field_value;
		break;
		case 'longitude':
		$result = $field_value;
		break;
		case 'elevation_m':
		$result = $field_value;
		break;
		case 'alt_ft':
		$result = $field_value;
		break;
		case 'depth_m':
		$result = $field_value;
		break;
		case 'flight_level':
		$result = $field_value;
		break;
		case 'velocity_kmh':
		$result = $field_value;
		break;
		case 'accel_g':
		$result = $field_value;
		break;
		case '--':
		$result = $field_value;
		break;
		case 'pattern_hash':
		$result = $field_value;
		break;
		case '--':
		$result = $field_value;
		break;
		case 'created_at':
		$result = $field_value;
		break;
		case 'updated_at':
		$result = $field_value;
		break;
		case '--':
		$result = $field_value;
		break;
		case ''')':
		$result = $field_value;
		break;
		case ''')':
		$result = $field_value;
		break;
		case ''')':
		$result = $field_value;
		break;
		case ''')':
		$result = $field_value;
		break;
		case '2}$'':
		$result = $field_value;
		break;
		case 'created_by':
		$container = \Joomla\CMS\Factory::getContainer();
		$userFactory = $container->get(UserFactoryInterface::class);
		$user = $userFactory->loadUserById($field_value);
		$result = $user->name;
		break;
		}
		break;
		case '#__ommp_media':
		switch($field_name){
		case 'id':
		$result = $field_value;
		break;
		case 'sighting_id':
		$result = $field_value;
		break;
		case 'kind':
		$result = $field_value;
		break;
		case 'uri':
		$result = $field_value;
		break;
		case 'mime':
		$result = $field_value;
		break;
		case 'captured_at':
		$result = $field_value;
		break;
		case 'meta':
		$result = $field_value;
		break;
		case 'created_at':
		$result = $field_value;
		break;
		case 'created_by':
		$container = \Joomla\CMS\Factory::getContainer();
		$userFactory = $container->get(UserFactoryInterface::class);
		$user = $userFactory->loadUserById($field_value);
		$result = $user->name;
		break;
		}
		break;
		case '#__ommp_witnesses':
		switch($field_name){
		case 'id':
		$result = $field_value;
		break;
		case 'sighting_id':
		$result = $field_value;
		break;
		case 'label':
		$result = $field_value;
		break;
		case 'notes':
		$result = $field_value;
		break;
		case 'created_at':
		$result = $field_value;
		break;
		case 'created_by':
		$container = \Joomla\CMS\Factory::getContainer();
		$userFactory = $container->get(UserFactoryInterface::class);
		$user = $userFactory->loadUserById($field_value);
		$result = $user->name;
		break;
		}
		break;
		}

		return $result;
	}

	/**
	 * Returns the translatable name of the element
	 *
	 * @param   string .................. $table_name table name
	 * @param   string                   $field   Field name
	 *
	 * @return string Translatable name.
	 */
	public static function renderTranslatableHeader($table_name, $field)
	{
		return Text::_(
			'MOD_UFOREPORTING_HEADER_FIELD_' . str_replace('#__', '', strtoupper($table_name)) . '_' . strtoupper($field)
		);
	}

	/**
	 * Checks if an element should appear in the table/item view
	 *
	 * @param   string $field name of the field
	 *
	 * @return boolean True if it should appear, false otherwise
	 */
	public static function shouldAppear($field)
	{
		$noHeaderFields = array('checked_out_time', 'checked_out', 'ordering', 'state');

		return !in_array($field, $noHeaderFields);
	}

	
}
