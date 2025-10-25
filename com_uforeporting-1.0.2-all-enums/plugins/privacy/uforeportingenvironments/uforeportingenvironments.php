<?php
/**
 * @package    Com_Uforeporting
 * @subpackage Privacy.environment
 * @author      Claude.ai, Eric D. Martin & Open.Ai <edm@252edmusmc.xyz>
 * @copyright   Claude.ai, Eric D. Martin & Open.Ai
 * @license    Open Source, Paid Support
 */

defined('_JEXEC') or die;

use Joomla\CMS\User\User;
use Joomla\Component\Privacy\Administrator\Plugin\PrivacyPlugin;
use Joomla\Component\Privacy\Administrator\Table\RequestTable;

/**
 * Privacy plugin managing Joomla user environment data
 *
 * @since  1.0.0
 */
class PlgPrivacyXXX_UCFIRST_COMPONENT_PLUGIN_TABLE_NAME_XXX extends PrivacyPlugin
{
	/**
	 * Processes an export request for environment data
	 *
	 * This event will collect data for the environment table
	 *
	 * @param   RequestTable  $request  The request record being processed
	 * @param   User          $user     The user account associated with this request if available
	 *
	 * @return  \Joomla\Component\Privacy\Administrator\Export\Domain[]
	 *
	 * @since   1.0.0
	 */
	public function onPrivacyExportRequest(RequestTable $request, User $user = null)
	{
		if (!$user)
		{
			return array();
		}

		$domains   = array();
		$domain    = $this->createDomain('user_environment', 'joomla_user_environment_data');
		$domains[] = $domain;

		$query = $this->db->getQuery(true)
			->select('*')
			->from($this->db->quoteName('#__ommp_environment'))
			->where($this->db->quoteName('created_by') . ' = ' . (int) $user->id);

		$items = $this->db->setQuery($query)->loadObjectList();

		foreach ($items as $item)
		{
			$domain->addItem($this->createItemFromArray((array) $item));
		}

		$domains[] = $this->createCustomFieldsDomain('com_uforeporting.environment', $items);

		return $domains;
	}

	/**
	 * Removes the data associated with a remove information request
	 *
	 * This event will pseudoanonymise the environment
	 *
	 * @param   RequestTable  $request  The request record being processed
	 * @param   User          $user     The user account associated with this request if available
	 *
	 * @return  void
	 *
	 * @since   1.0.0
	 */
	public function onPrivacyRemoveData(RequestTable $request, User $user = null)
	{
		// This plugin only processes data for registered user accounts
		if (!$user)
		{
			return;
		}

		$db = $this->db;

		$query = $db->getQuery(true);

		$query->clear()
			->delete($db->quoteName('#__ommp_environment'))
			->where($this->db->quoteName('created_by') . ' = ' . (int) $user->id);

		$db->setQuery($query)
			->execute();
	}
}
