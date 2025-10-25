<?php
/**
 * @package    Com_Uforeporting
 * @subpackage Privacy.media
 * @author      Claude.ai, Eric D. Martin & Open.Ai <edm@252edmusmc.xyz>
 * @copyright   Claude.ai, Eric D. Martin & Open.Ai
 * @license    Open Source, Paid Support
 */

defined('_JEXEC') or die;

use Joomla\CMS\User\User;
use Joomla\Component\Privacy\Administrator\Plugin\PrivacyPlugin;
use Joomla\Component\Privacy\Administrator\Table\RequestTable;

/**
 * Privacy plugin managing Joomla user media data
 *
 * @since  1.0.0
 */
class PlgPrivacyUforeportingmedias extends PrivacyPlugin
{
	/**
	 * Processes an export request for media data
	 *
	 * This event will collect data for the media table
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
		$domain    = $this->createDomain('user_media', 'joomla_user_media_data');
		$domains[] = $domain;

		$query = $this->db->getQuery(true)
			->select('*')
			->from($this->db->quoteName('#__ommp_media'))
			->where($this->db->quoteName('created_by') . ' = ' . (int) $user->id);

		$items = $this->db->setQuery($query)->loadObjectList();

		foreach ($items as $item)
		{
			$domain->addItem($this->createItemFromArray((array) $item));
		}

		$domains[] = $this->createCustomFieldsDomain('com_uforeporting.media', $items);

		return $domains;
	}

	/**
	 * Removes the data associated with a remove information request
	 *
	 * This event will pseudoanonymise the media
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
			->delete($db->quoteName('#__ommp_media'))
			->where($this->db->quoteName('created_by') . ' = ' . (int) $user->id);

		$db->setQuery($query)
			->execute();
	}
}
