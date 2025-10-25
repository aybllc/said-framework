<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Uforeporting
 * @author      Claude.ai, Eric D. Martin & Open.Ai <edm@252edmusmc.xyz>
 * @copyright   Claude.ai, Eric D. Martin & Open.Ai
 * @license    Open Source, Paid Support
 */

namespace Uforresporting\Component\Uforeporting\Administrator\View\Sightings;
// No direct access
defined('_JEXEC') or die;

use \Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
use \Uforresporting\Component\Uforeporting\Administrator\Helper\UforeportingHelper;
use \Joomla\CMS\Toolbar\Toolbar;
use \Joomla\CMS\Toolbar\ToolbarHelper;
use \Joomla\CMS\Language\Text;
use \Joomla\Component\Content\Administrator\Extension\ContentComponent;
use \Joomla\CMS\Form\Form;
use \Joomla\CMS\HTML\Helpers\Sidebar;
/**
 * View class for a list of Sightings.
 *
 * @since  1.0.0
 */
class HtmlView extends BaseHtmlView
{
	protected $items;

	protected $pagination;

	protected $state;

	/**
	 * Display the view
	 *
	 * @param   string  $tpl  Template name
	 *
	 * @return void
	 *
	 * @throws Exception
	 */
	public function display($tpl = null)
	{
		$this->state = $this->get('State');
		$this->items = $this->get('Items');
		$this->pagination = $this->get('Pagination');
		$this->filterForm = $this->get('FilterForm');
		$this->activeFilters = $this->get('ActiveFilters');

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			throw new \Exception(implode("\n", $errors));
		}

		$this->addToolbar();

		$this->sidebar = Sidebar::render();
		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @return  void
	 *
	 * @since   1.0.0
	 */
	protected function addToolbar()
	{
		$state = $this->get('State');
		$canDo = UforeportingHelper::getActions();

		ToolbarHelper::title(Text::_('COM_UFOREPORTING_TITLE_SIGHTINGS'), "generic");

		$toolbar = Toolbar::getInstance('toolbar');

		// Check if the form exists before showing the add/edit buttons
		$formPath = JPATH_COMPONENT_ADMINISTRATOR . '/src/View/Sightings';

		if (file_exists($formPath))
		{
			if ($canDo->get('core.create'))
			{
				$toolbar->addNew('sighting.add');
			}
		}

		if ($canDo->get('core.edit.state'))
		{
			$dropdown = $toolbar->dropdownButton('status-group')
				->text('JTOOLBAR_CHANGE_STATUS')
				->toggleSplit(false)
				->icon('fas fa-ellipsis-h')
				->buttonClass('btn btn-action')
				->listCheck(true);

			$childBar = $dropdown->getChildToolbar();

			if (isset($this->items[0]->state))
			{
				$childBar->publish('sightings.publish')->listCheck(true);
				$childBar->unpublish('sightings.unpublish')->listCheck(true);
				$childBar->archive('sightings.archive')->listCheck(true);
			}
			elseif (isset($this->items[0]))
			{
				// If this component does not use state then show a direct delete button as we can not trash
				$toolbar->delete('sightings.delete')
				->text('JTOOLBAR_EMPTY_TRASH')
				->message('JGLOBAL_CONFIRM_DELETE')
				->listCheck(true);
			}

			$childBar->standardButton('duplicate')
				->text('JTOOLBAR_DUPLICATE')
				->icon('fas fa-copy')
				->task('sightings.duplicate')
				->listCheck(true);

			if (isset($this->items[0]->checked_out))
			{
				$childBar->checkin('sightings.checkin')->listCheck(true);
			}

			if (isset($this->items[0]->state))
			{
				$childBar->trash('sightings.trash')->listCheck(true);
			}
		}

		

		// Show trash and delete for components that uses the state field
		if (isset($this->items[0]->state))
		{

			if ($this->state->get('filter.state') == ContentComponent::CONDITION_TRASHED && $canDo->get('core.delete'))
			{
				$toolbar->delete('sightings.delete')
					->text('JTOOLBAR_EMPTY_TRASH')
					->message('JGLOBAL_CONFIRM_DELETE')
					->listCheck(true);
			}
		}

		if ($canDo->get('core.admin'))
		{
			$toolbar->preferences('com_uforeporting');
		}

		// Set sidebar action
		Sidebar::setAction('index.php?option=com_uforeporting&view=sightings');
	}
	
	/**
	 * Method to order fields 
	 *
	 * @return void 
	 */
	protected function getSortFields()
	{
		return array(
			'a.`id`' => Text::_('JGRID_HEADING_ID'),
			'a.`session_id`' => Text::_('COM_UFOREPORTING_SIGHTINGS_SESSION_ID'),
			'a.`occurred_at`' => Text::_('COM_UFOREPORTING_SIGHTINGS_OCCURRED_AT'),
			'a.`--`' => Text::_('COM_UFOREPORTING_SIGHTINGS_--'),
			'a.`obs_mod`' => Text::_('COM_UFOREPORTING_SIGHTINGS_OBS_MOD'),
			'a.`obs_substrate`' => Text::_('COM_UFOREPORTING_SIGHTINGS_OBS_SUBSTRATE'),
			'a.`obs_kin`' => Text::_('COM_UFOREPORTING_SIGHTINGS_OBS_KIN'),
			'a.`obs_sens`' => Text::_('COM_UFOREPORTING_SIGHTINGS_OBS_SENS'),
			'a.`obs_occ`' => Text::_('COM_UFOREPORTING_SIGHTINGS_OBS_OCC'),
			'a.`obs_veh`' => Text::_('COM_UFOREPORTING_SIGHTINGS_OBS_VEH'),
			'a.`--`' => Text::_('COM_UFOREPORTING_SIGHTINGS_--'),
			'a.`obj_mod`' => Text::_('COM_UFOREPORTING_SIGHTINGS_OBJ_MOD'),
			'a.`obj_substrate`' => Text::_('COM_UFOREPORTING_SIGHTINGS_OBJ_SUBSTRATE'),
			'a.`behavior_code`' => Text::_('COM_UFOREPORTING_SIGHTINGS_BEHAVIOR_CODE'),
			'a.`speed_mod`' => Text::_('COM_UFOREPORTING_SIGHTINGS_SPEED_MOD'),
			'a.`shape_code`' => Text::_('COM_UFOREPORTING_SIGHTINGS_SHAPE_CODE'),
			'a.`size_mod`' => Text::_('COM_UFOREPORTING_SIGHTINGS_SIZE_MOD'),
			'a.`--`' => Text::_('COM_UFOREPORTING_SIGHTINGS_--'),
			'a.`confidence`' => Text::_('COM_UFOREPORTING_SIGHTINGS_CONFIDENCE'),
			'a.`--`' => Text::_('COM_UFOREPORTING_SIGHTINGS_--'),
			'a.`longitude`' => Text::_('COM_UFOREPORTING_SIGHTINGS_LONGITUDE'),
			'a.`elevation_m`' => Text::_('COM_UFOREPORTING_SIGHTINGS_ELEVATION_M'),
			'a.`alt_ft`' => Text::_('COM_UFOREPORTING_SIGHTINGS_ALT_FT'),
			'a.`depth_m`' => Text::_('COM_UFOREPORTING_SIGHTINGS_DEPTH_M'),
			'a.`flight_level`' => Text::_('COM_UFOREPORTING_SIGHTINGS_FLIGHT_LEVEL'),
			'a.`velocity_kmh`' => Text::_('COM_UFOREPORTING_SIGHTINGS_VELOCITY_KMH'),
			'a.`accel_g`' => Text::_('COM_UFOREPORTING_SIGHTINGS_ACCEL_G'),
			'a.`--`' => Text::_('COM_UFOREPORTING_SIGHTINGS_--'),
			'a.`pattern_hash`' => Text::_('COM_UFOREPORTING_SIGHTINGS_PATTERN_HASH'),
			'a.`--`' => Text::_('COM_UFOREPORTING_SIGHTINGS_--'),
			'a.`created_at`' => Text::_('COM_UFOREPORTING_SIGHTINGS_CREATED_AT'),
			'a.`updated_at`' => Text::_('COM_UFOREPORTING_SIGHTINGS_UPDATED_AT'),
			'a.`--`' => Text::_('COM_UFOREPORTING_SIGHTINGS_--'),
			'a.`'')`' => Text::_('COM_UFOREPORTING_SIGHTINGS_'),
			'a.`'')`' => Text::_('COM_UFOREPORTING_SIGHTINGS_'),
			'a.`'')`' => Text::_('COM_UFOREPORTING_SIGHTINGS_'),
			'a.`'')`' => Text::_('COM_UFOREPORTING_SIGHTINGS_'),
			'a.`2}$'`' => Text::_('COM_UFOREPORTING_SIGHTINGS_2'),
			'a.`ordering`' => Text::_('JGRID_HEADING_ORDERING'),
			'a.`state`' => Text::_('JSTATUS'),
			'a.`created_by`' => Text::_('COM_UFOREPORTING_SIGHTINGS_CREATED_BY'),
		);
	}

	/**
	 * Check if state is set
	 *
	 * @param   mixed  $state  State
	 *
	 * @return bool
	 */
	public function getState($state)
	{
		return isset($this->state->{$state}) ? $this->state->{$state} : false;
	}
}
