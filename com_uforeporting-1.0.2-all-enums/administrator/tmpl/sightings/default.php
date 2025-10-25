<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Uforeporting
 * @author      Claude.ai, Eric D. Martin & Open.Ai <edm@252edmusmc.xyz>
 * @copyright   Claude.ai, Eric D. Martin & Open.Ai
 * @license    Open Source, Paid Support
 */

// No direct access
defined('_JEXEC') or die;


use \Joomla\CMS\HTML\HTMLHelper;
use \Joomla\CMS\Factory;
use \Joomla\CMS\Uri\Uri;
use \Joomla\CMS\Router\Route;
use \Joomla\CMS\Layout\LayoutHelper;
use \Joomla\CMS\Language\Text;
use Joomla\CMS\Session\Session;

HTMLHelper::_('bootstrap.tooltip');
HTMLHelper::_('behavior.multiselect');

// Import CSS
$wa =  $this->document->getWebAssetManager();
$wa->useStyle('com_uforeporting.admin')
    ->useScript('com_uforeporting.admin');

$user      = Factory::getApplication()->getIdentity();
$userId    = $user->get('id');
$listOrder = $this->state->get('list.ordering');
$listDirn  = $this->state->get('list.direction');
$canOrder  = $user->authorise('core.edit.state', 'com_uforeporting');

$saveOrder = $listOrder == 'a.ordering';

if (!empty($saveOrder))
{
	$saveOrderingUrl = 'index.php?option=com_uforeporting&task=sightings.saveOrderAjax&tmpl=component&' . Session::getFormToken() . '=1';
	HTMLHelper::_('draggablelist.draggable');
}

?>

<form action="<?php echo Route::_('index.php?option=com_uforeporting&view=sightings'); ?>" method="post"
	  name="adminForm" id="adminForm">
	<div class="row">
		<div class="col-md-12">
			<div id="j-main-container" class="j-main-container">
			<?php echo LayoutHelper::render('joomla.searchtools.default', array('view' => $this)); ?>

				<div class="clearfix"></div>
				<table class="table table-striped" id="sightingList">
					<thead>
					<tr>
						<th class="w-1 text-center">
							<input type="checkbox" autocomplete="off" class="form-check-input" name="checkall-toggle" value=""
								   title="<?php echo Text::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)"/>
						</th>
						
					<?php if (isset($this->items[0]->ordering)): ?>
					<th scope="col" class="w-1 text-center d-none d-md-table-cell">

					<?php echo HTMLHelper::_('searchtools.sort', '', 'a.ordering', $listDirn, $listOrder, null, 'asc', 'JGRID_HEADING_ORDERING', 'icon-menu-2'); ?>

					</th>
					<?php endif; ?>

						
					<th  scope="col" class="w-1 text-center">
						<?php echo HTMLHelper::_('searchtools.sort', 'JSTATUS', 'a.state', $listDirn, $listOrder); ?>
					</th>
						
						<th class='left'>
							<?php echo HTMLHelper::_('searchtools.sort',  'COM_UFOREPORTING_SIGHTINGS_SESSION_ID', 'a.session_id', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo HTMLHelper::_('searchtools.sort',  'COM_UFOREPORTING_SIGHTINGS_OCCURRED_AT', 'a.occurred_at', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo HTMLHelper::_('searchtools.sort',  'COM_UFOREPORTING_SIGHTINGS_--', 'a.--', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo HTMLHelper::_('searchtools.sort',  'COM_UFOREPORTING_SIGHTINGS_OBS_MOD', 'a.obs_mod', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo HTMLHelper::_('searchtools.sort',  'COM_UFOREPORTING_SIGHTINGS_OBS_SUBSTRATE', 'a.obs_substrate', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo HTMLHelper::_('searchtools.sort',  'COM_UFOREPORTING_SIGHTINGS_OBS_KIN', 'a.obs_kin', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo HTMLHelper::_('searchtools.sort',  'COM_UFOREPORTING_SIGHTINGS_OBS_SENS', 'a.obs_sens', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo HTMLHelper::_('searchtools.sort',  'COM_UFOREPORTING_SIGHTINGS_OBS_OCC', 'a.obs_occ', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo HTMLHelper::_('searchtools.sort',  'COM_UFOREPORTING_SIGHTINGS_OBS_VEH', 'a.obs_veh', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo HTMLHelper::_('searchtools.sort',  'COM_UFOREPORTING_SIGHTINGS_--', 'a.--', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo HTMLHelper::_('searchtools.sort',  'COM_UFOREPORTING_SIGHTINGS_OBJ_MOD', 'a.obj_mod', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo HTMLHelper::_('searchtools.sort',  'COM_UFOREPORTING_SIGHTINGS_OBJ_SUBSTRATE', 'a.obj_substrate', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo HTMLHelper::_('searchtools.sort',  'COM_UFOREPORTING_SIGHTINGS_BEHAVIOR_CODE', 'a.behavior_code', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo HTMLHelper::_('searchtools.sort',  'COM_UFOREPORTING_SIGHTINGS_SPEED_MOD', 'a.speed_mod', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo HTMLHelper::_('searchtools.sort',  'COM_UFOREPORTING_SIGHTINGS_SHAPE_CODE', 'a.shape_code', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo HTMLHelper::_('searchtools.sort',  'COM_UFOREPORTING_SIGHTINGS_SIZE_MOD', 'a.size_mod', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo HTMLHelper::_('searchtools.sort',  'COM_UFOREPORTING_SIGHTINGS_--', 'a.--', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo HTMLHelper::_('searchtools.sort',  'COM_UFOREPORTING_SIGHTINGS_CONFIDENCE', 'a.confidence', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo HTMLHelper::_('searchtools.sort',  'COM_UFOREPORTING_SIGHTINGS_--', 'a.--', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo HTMLHelper::_('searchtools.sort',  'COM_UFOREPORTING_SIGHTINGS_LONGITUDE', 'a.longitude', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo HTMLHelper::_('searchtools.sort',  'COM_UFOREPORTING_SIGHTINGS_ELEVATION_M', 'a.elevation_m', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo HTMLHelper::_('searchtools.sort',  'COM_UFOREPORTING_SIGHTINGS_ALT_FT', 'a.alt_ft', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo HTMLHelper::_('searchtools.sort',  'COM_UFOREPORTING_SIGHTINGS_DEPTH_M', 'a.depth_m', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo HTMLHelper::_('searchtools.sort',  'COM_UFOREPORTING_SIGHTINGS_FLIGHT_LEVEL', 'a.flight_level', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo HTMLHelper::_('searchtools.sort',  'COM_UFOREPORTING_SIGHTINGS_VELOCITY_KMH', 'a.velocity_kmh', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo HTMLHelper::_('searchtools.sort',  'COM_UFOREPORTING_SIGHTINGS_ACCEL_G', 'a.accel_g', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo HTMLHelper::_('searchtools.sort',  'COM_UFOREPORTING_SIGHTINGS_--', 'a.--', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo HTMLHelper::_('searchtools.sort',  'COM_UFOREPORTING_SIGHTINGS_PATTERN_HASH', 'a.pattern_hash', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo HTMLHelper::_('searchtools.sort',  'COM_UFOREPORTING_SIGHTINGS_--', 'a.--', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo HTMLHelper::_('searchtools.sort',  'COM_UFOREPORTING_SIGHTINGS_CREATED_AT', 'a.created_at', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo HTMLHelper::_('searchtools.sort',  'COM_UFOREPORTING_SIGHTINGS_UPDATED_AT', 'a.updated_at', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo HTMLHelper::_('searchtools.sort',  'COM_UFOREPORTING_SIGHTINGS_--', 'a.--', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo HTMLHelper::_('searchtools.sort',  'COM_UFOREPORTING_SIGHTINGS_', 'a.'')', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo HTMLHelper::_('searchtools.sort',  'COM_UFOREPORTING_SIGHTINGS_', 'a.'')', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo HTMLHelper::_('searchtools.sort',  'COM_UFOREPORTING_SIGHTINGS_', 'a.'')', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo HTMLHelper::_('searchtools.sort',  'COM_UFOREPORTING_SIGHTINGS_', 'a.'')', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo HTMLHelper::_('searchtools.sort',  'COM_UFOREPORTING_SIGHTINGS_2', 'a.2}$'', $listDirn, $listOrder); ?>
						</th>
						<th class='left'>
							<?php echo HTMLHelper::_('searchtools.sort',  'COM_UFOREPORTING_SIGHTINGS_CREATED_BY', 'a.created_by', $listDirn, $listOrder); ?>
						</th>
						
					<th scope="col" class="w-3 d-none d-lg-table-cell" >

						<?php echo HTMLHelper::_('searchtools.sort',  'JGRID_HEADING_ID', 'a.id', $listDirn, $listOrder); ?>					</th>
					</tr>
					</thead>
					<tfoot>
					<tr>
						<td colspan="<?php echo isset($this->items[0]) ? count(get_object_vars($this->items[0])) : 10; ?>">
							<?php echo $this->pagination->getListFooter(); ?>
						</td>
					</tr>
					</tfoot>
					<tbody <?php if (!empty($saveOrder)) :?> class="js-draggable" data-url="<?php echo $saveOrderingUrl; ?>" data-direction="<?php echo strtolower($listDirn); ?>" <?php endif; ?>>
					<?php foreach ($this->items as $i => $item) :
						$ordering   = ($listOrder == 'a.ordering');
						$canCreate  = $user->authorise('core.create', 'com_uforeporting');
						$canEdit    = $user->authorise('core.edit', 'com_uforeporting');
						$canCheckin = $user->authorise('core.manage', 'com_uforeporting');
						$canChange  = $user->authorise('core.edit.state', 'com_uforeporting');
						?>
						<tr class="row<?php echo $i % 2; ?>" data-draggable-group='1' data-transition>
							<td class="text-center">
								<?php echo HTMLHelper::_('grid.id', $i, $item->id); ?>
							</td>
							
							<?php if (isset($this->items[0]->ordering)) : ?>

							<td class="text-center d-none d-md-table-cell">

							<?php

							$iconClass = '';

							if (!$canChange)

							{
								$iconClass = ' inactive';

							}
							elseif (!$saveOrder)

							{
								$iconClass = ' inactive" title="' . Text::_('JORDERINGDISABLED');

							}							?>							<span class="sortable-handler<?php echo $iconClass ?>">
							<span class="icon-ellipsis-v" aria-hidden="true"></span>
							</span>
							<?php if ($canChange && $saveOrder) : ?>
							<input type="text" name="order[]" size="5" value="<?php echo $item->ordering; ?>" class="width-20 text-area-order hidden">
								<?php endif; ?>
							</td>
							<?php endif; ?>

							
							<td class="text-center">
								<?php echo HTMLHelper::_('jgrid.published', $item->state, $i, 'sightings.', $canChange, 'cb'); ?>
							</td>
							
							<td>
								<?php echo $item->session_id; ?>
							</td>
							<td>
								<?php echo $item->occurred_at; ?>
							</td>
							<td>
								<?php echo $item->--; ?>
							</td>
							<td>
								<?php echo $item->obs_mod; ?>
							</td>
							<td>
								<?php echo $item->obs_substrate; ?>
							</td>
							<td>
								<?php echo $item->obs_kin; ?>
							</td>
							<td>
								<?php echo $item->obs_sens; ?>
							</td>
							<td>
								<?php echo $item->obs_occ; ?>
							</td>
							<td>
								<?php echo $item->obs_veh; ?>
							</td>
							<td>
								<?php echo $item->--; ?>
							</td>
							<td>
								<?php echo $item->obj_mod; ?>
							</td>
							<td>
								<?php echo $item->obj_substrate; ?>
							</td>
							<td>
								<?php echo $item->behavior_code; ?>
							</td>
							<td>
								<?php echo $item->speed_mod; ?>
							</td>
							<td>
								<?php echo $item->shape_code; ?>
							</td>
							<td>
								<?php echo $item->size_mod; ?>
							</td>
							<td>
								<?php echo $item->--; ?>
							</td>
							<td>
								<?php echo $item->confidence; ?>
							</td>
							<td>
								<?php echo $item->--; ?>
							</td>
							<td>
								<?php echo $item->longitude; ?>
							</td>
							<td>
								<?php echo $item->elevation_m; ?>
							</td>
							<td>
								<?php echo $item->alt_ft; ?>
							</td>
							<td>
								<?php echo $item->depth_m; ?>
							</td>
							<td>
								<?php echo $item->flight_level; ?>
							</td>
							<td>
								<?php echo $item->velocity_kmh; ?>
							</td>
							<td>
								<?php echo $item->accel_g; ?>
							</td>
							<td>
								<?php echo $item->--; ?>
							</td>
							<td>
								<?php echo $item->pattern_hash; ?>
							</td>
							<td>
								<?php echo $item->--; ?>
							</td>
							<td>
								<?php echo $item->created_at; ?>
							</td>
							<td>
								<?php
									$date = $item->updated_at;
									echo $date > 0 ? HTMLHelper::_('date', $date, Text::_('DATE_FORMAT_LC4')) : '-';
								?>
							</td>
							<td>
								<?php echo $item->--; ?>
							</td>
							<td>
								<?php echo $item->''); ?>
							</td>
							<td>
								<?php echo $item->''); ?>
							</td>
							<td>
								<?php echo $item->''); ?>
							</td>
							<td>
								<?php echo $item->''); ?>
							</td>
							<td>
								<?php echo $item->2}$'; ?>
							</td>
							<td>
								<?php echo $item->created_by; ?>
							</td>
							
							<td class="d-none d-lg-table-cell">
									<a href="<?php echo Route::_('index.php?option=com_uforeporting&task=sighting.edit&id='.(int) $item->id); ?>">
							<?php echo $item->id; ?>

							</td>


						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>

				<input type="hidden" name="task" value=""/>
				<input type="hidden" name="boxchecked" value="0"/>
				<input type="hidden" name="list[fullorder]" value="<?php echo $listOrder; ?> <?php echo $listDirn; ?>"/>
				<?php echo HTMLHelper::_('form.token'); ?>
			</div>
		</div>
	</div>
</form>