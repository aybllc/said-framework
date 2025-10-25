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
use \Joomla\CMS\Language\Text;
use \Joomla\CMS\Layout\LayoutHelper;
use \Joomla\CMS\Session\Session;
use \Joomla\CMS\User\UserFactoryInterface;

HTMLHelper::_('bootstrap.tooltip');
HTMLHelper::_('behavior.multiselect');
HTMLHelper::_('formbehavior.chosen', 'select');

$user       = Factory::getApplication()->getIdentity();
$userId     = $user->get('id');
$listOrder  = $this->state->get('list.ordering');
$listDirn   = $this->state->get('list.direction');
$canCreate  = $user->authorise('core.create', 'com_uforeporting') && file_exists(JPATH_COMPONENT . DIRECTORY_SEPARATOR . 'forms' . DIRECTORY_SEPARATOR . 'sightingform.xml');
$canEdit    = $user->authorise('core.edit', 'com_uforeporting') && file_exists(JPATH_COMPONENT .  DIRECTORY_SEPARATOR . 'forms' . DIRECTORY_SEPARATOR . 'sightingform.xml');
$canCheckin = $user->authorise('core.manage', 'com_uforeporting');
$canChange  = $user->authorise('core.edit.state', 'com_uforeporting');
$canDelete  = $user->authorise('core.delete', 'com_uforeporting');

// Import CSS
$wa = $this->document->getWebAssetManager();
$wa->useStyle('com_uforeporting.list');
?>

<?php if ($this->params->get('show_page_heading')) : ?>
    <div class="page-header">
        <h1> <?php echo $this->escape($this->params->get('page_heading')); ?> </h1>
    </div>
<?php endif;?>
<form action="<?php echo htmlspecialchars(Uri::getInstance()->toString()); ?>" method="post"
	  name="adminForm" id="adminForm">
	
	<div class="table-responsive">
		<table class="table table-striped" id="sightingList">
			<thead>
			<tr>
				
					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_UFOREPORTING_SIGHTINGS_ID', 'a.id', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_UFOREPORTING_SIGHTINGS_SESSION_ID', 'a.session_id', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_UFOREPORTING_SIGHTINGS_OCCURRED_AT', 'a.occurred_at', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_UFOREPORTING_SIGHTINGS_--', 'a.--', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_UFOREPORTING_SIGHTINGS_OBS_MOD', 'a.obs_mod', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_UFOREPORTING_SIGHTINGS_OBS_SUBSTRATE', 'a.obs_substrate', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_UFOREPORTING_SIGHTINGS_OBS_KIN', 'a.obs_kin', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_UFOREPORTING_SIGHTINGS_OBS_SENS', 'a.obs_sens', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_UFOREPORTING_SIGHTINGS_OBS_OCC', 'a.obs_occ', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_UFOREPORTING_SIGHTINGS_OBS_VEH', 'a.obs_veh', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_UFOREPORTING_SIGHTINGS_--', 'a.--', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_UFOREPORTING_SIGHTINGS_OBJ_MOD', 'a.obj_mod', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_UFOREPORTING_SIGHTINGS_OBJ_SUBSTRATE', 'a.obj_substrate', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_UFOREPORTING_SIGHTINGS_BEHAVIOR_CODE', 'a.behavior_code', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_UFOREPORTING_SIGHTINGS_SPEED_MOD', 'a.speed_mod', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_UFOREPORTING_SIGHTINGS_SHAPE_CODE', 'a.shape_code', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_UFOREPORTING_SIGHTINGS_SIZE_MOD', 'a.size_mod', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_UFOREPORTING_SIGHTINGS_--', 'a.--', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_UFOREPORTING_SIGHTINGS_CONFIDENCE', 'a.confidence', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_UFOREPORTING_SIGHTINGS_--', 'a.--', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_UFOREPORTING_SIGHTINGS_LONGITUDE', 'a.longitude', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_UFOREPORTING_SIGHTINGS_ELEVATION_M', 'a.elevation_m', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_UFOREPORTING_SIGHTINGS_ALT_FT', 'a.alt_ft', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_UFOREPORTING_SIGHTINGS_DEPTH_M', 'a.depth_m', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_UFOREPORTING_SIGHTINGS_FLIGHT_LEVEL', 'a.flight_level', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_UFOREPORTING_SIGHTINGS_VELOCITY_KMH', 'a.velocity_kmh', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_UFOREPORTING_SIGHTINGS_ACCEL_G', 'a.accel_g', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_UFOREPORTING_SIGHTINGS_--', 'a.--', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_UFOREPORTING_SIGHTINGS_PATTERN_HASH', 'a.pattern_hash', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_UFOREPORTING_SIGHTINGS_--', 'a.--', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_UFOREPORTING_SIGHTINGS_CREATED_AT', 'a.created_at', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_UFOREPORTING_SIGHTINGS_UPDATED_AT', 'a.updated_at', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_UFOREPORTING_SIGHTINGS_--', 'a.--', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_UFOREPORTING_SIGHTINGS_', 'a.'')', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_UFOREPORTING_SIGHTINGS_', 'a.'')', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_UFOREPORTING_SIGHTINGS_', 'a.'')', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_UFOREPORTING_SIGHTINGS_', 'a.'')', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_UFOREPORTING_SIGHTINGS_2', 'a.2}$'', $listDirn, $listOrder); ?>
					</th>

					<th >
						<?php echo HTMLHelper::_('grid.sort', 'JPUBLISHED', 'a.state', $listDirn, $listOrder); ?>
					</th>

					<th class=''>
						<?php echo HTMLHelper::_('grid.sort',  'COM_UFOREPORTING_SIGHTINGS_CREATED_BY', 'a.created_by', $listDirn, $listOrder); ?>
					</th>

						<?php if ($canEdit || $canDelete): ?>
					<th class="center">
						<?php echo Text::_('COM_UFOREPORTING_SIGHTINGS_ACTIONS'); ?>
					</th>
					<?php endif; ?>

			</tr>
			</thead>
			<tfoot>
			<tr>
				<td colspan="<?php echo isset($this->items[0]) ? count(get_object_vars($this->items[0])) : 10; ?>">
					<div class="pagination">
						<?php echo $this->pagination->getPagesLinks(); ?>
					</div>
				</td>
			</tr>
			</tfoot>
			<tbody>
			<?php foreach ($this->items as $i => $item) : ?>
				<?php $canEdit = $user->authorise('core.edit', 'com_uforeporting'); ?>
				<?php if (!$canEdit && $user->authorise('core.edit.own', 'com_uforeporting')): ?>
				<?php $canEdit = Factory::getApplication()->getIdentity()->id == $item->created_by; ?>
				<?php endif; ?>

				<tr class="row<?php echo $i % 2; ?>">
					
					<td>
						<?php $canCheckin = Factory::getApplication()->getIdentity()->authorise('core.manage', 'com_uforeporting.' . $item->id) || $item->checked_out == Factory::getApplication()->getIdentity()->id; ?>
						<?php if($canCheckin && $item->checked_out > 0) : ?>
							<a href="<?php echo Route::_('index.php?option=com_uforeporting&task=sighting.checkin&id=' . $item->id .'&'. Session::getFormToken() .'=1'); ?>">
							<?php echo HTMLHelper::_('jgrid.checkedout', $i, $item->uEditor, $item->checked_out_time, 'sighting.', false); ?></a>
						<?php endif; ?>
						<a href="<?php echo Route::_('index.php?option=com_uforeporting&view=sighting&id='.(int) $item->id); ?>">
							<?php echo $this->escape($item->id); ?></a>
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
						<?php $class = ($canChange) ? 'active' : 'disabled'; ?>
						<a class="btn btn-micro <?php echo $class; ?>" href="<?php echo ($canChange) ? Route::_('index.php?option=com_uforeporting&task=sighting.publish&id=' . $item->id . '&state=' . (($item->state + 1) % 2), false, 2) : '#'; ?>">
						<?php if ($item->state == 1): ?>
							<i class="icon-publish"></i>
						<?php else: ?>
							<i class="icon-unpublish"></i>
						<?php endif; ?>
						</a>
					</td>
					<td>
								<?php $container = \Joomla\CMS\Factory::getContainer();
								$userFactory = $container->get(UserFactoryInterface::class);?>
								<?php $user = $userFactory->loadUserById($item->created_by); ?>
								<?php echo $user->name; ?>
					</td>
					<?php if ($canEdit || $canDelete): ?>
						<td class="center">
							<?php $canCheckin = Factory::getApplication()->getIdentity()->authorise('core.manage', 'com_uforeporting.' . $item->id) || $item->checked_out == Factory::getApplication()->getIdentity()->id; ?>

							<?php if($canEdit && $item->checked_out == 0): ?>
								<a href="<?php echo Route::_('index.php?option=com_uforeporting&task=sighting.edit&id=' . $item->id, false, 2); ?>" class="btn btn-mini" type="button"><i class="icon-edit" ></i></a>
							<?php endif; ?>
							<?php if ($canDelete): ?>
								<a href="<?php echo Route::_('index.php?option=com_uforeporting&task=sightingform.remove&id=' . $item->id, false, 2); ?>" class="btn btn-mini delete-button" type="button"><i class="icon-trash" ></i></a>
							<?php endif; ?>
						</td>
					<?php endif; ?>

				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<?php if ($canCreate) : ?>
		<a href="<?php echo Route::_('index.php?option=com_uforeporting&task=sightingform.edit&id=0', false, 0); ?>"
		   class="btn btn-success btn-small"><i
				class="icon-plus"></i>
			<?php echo Text::_('COM_UFOREPORTING_ADD_ITEM'); ?></a>
	<?php endif; ?>

	<input type="hidden" name="task" value=""/>
	<input type="hidden" name="boxchecked" value="0"/>
	<input type="hidden" name="filter_order" value=""/>
	<input type="hidden" name="filter_order_Dir" value=""/>
	<?php echo HTMLHelper::_('form.token'); ?>
</form>

<?php
	if($canDelete) {
		$wa->addInlineScript("
			jQuery(document).ready(function () {
				jQuery('.delete-button').click(deleteItem);
			});

			function deleteItem() {

				if (!confirm(\"" . Text::_('COM_UFOREPORTING_DELETE_MESSAGE') . "\")) {
					return false;
				}
			}
		", [], [], ["jquery"]);
	}
?>