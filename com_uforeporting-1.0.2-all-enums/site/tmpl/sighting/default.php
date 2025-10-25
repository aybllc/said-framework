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
use \Joomla\CMS\Session\Session;
use Joomla\Utilities\ArrayHelper;

$canEdit = Factory::getApplication()->getIdentity()->authorise('core.edit', 'com_uforeporting.' . $this->item->id);

if (!$canEdit && Factory::getApplication()->getIdentity()->authorise('core.edit.own', 'com_uforeporting' . $this->item->id))
{
	$canEdit = Factory::getApplication()->getIdentity()->id == $this->item->created_by;
}
?>

<div class="item_fields">
<?php if ($this->params->get('show_page_heading')) : ?>
    <div class="page-header">
        <h1> <?php echo $this->escape($this->params->get('page_heading')); ?> </h1>
    </div>
    <?php endif;?>
	<table class="table">
		

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_ID'); ?></th>
			<td><?php echo $this->item->id; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_SESSION_ID'); ?></th>
			<td><?php echo $this->item->session_id; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_OCCURRED_AT'); ?></th>
			<td><?php echo $this->item->occurred_at; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_--'); ?></th>
			<td><?php echo $this->item->--; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_OBS_MOD'); ?></th>
			<td><?php echo $this->item->obs_mod; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_OBS_SUBSTRATE'); ?></th>
			<td><?php echo $this->item->obs_substrate; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_OBS_KIN'); ?></th>
			<td><?php echo $this->item->obs_kin; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_OBS_SENS'); ?></th>
			<td><?php echo $this->item->obs_sens; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_OBS_OCC'); ?></th>
			<td><?php echo $this->item->obs_occ; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_OBS_VEH'); ?></th>
			<td><?php echo $this->item->obs_veh; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_--'); ?></th>
			<td><?php echo $this->item->--; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_OBJ_MOD'); ?></th>
			<td><?php echo $this->item->obj_mod; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_OBJ_SUBSTRATE'); ?></th>
			<td><?php echo $this->item->obj_substrate; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_BEHAVIOR_CODE'); ?></th>
			<td><?php echo $this->item->behavior_code; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_SPEED_MOD'); ?></th>
			<td><?php echo $this->item->speed_mod; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_SHAPE_CODE'); ?></th>
			<td><?php echo $this->item->shape_code; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_SIZE_MOD'); ?></th>
			<td><?php echo $this->item->size_mod; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_--'); ?></th>
			<td><?php echo $this->item->--; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_CONFIDENCE'); ?></th>
			<td><?php echo $this->item->confidence; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_--'); ?></th>
			<td><?php echo $this->item->--; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_LONGITUDE'); ?></th>
			<td><?php echo $this->item->longitude; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_ELEVATION_M'); ?></th>
			<td><?php echo $this->item->elevation_m; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_ALT_FT'); ?></th>
			<td><?php echo $this->item->alt_ft; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_DEPTH_M'); ?></th>
			<td><?php echo $this->item->depth_m; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_FLIGHT_LEVEL'); ?></th>
			<td><?php echo $this->item->flight_level; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_VELOCITY_KMH'); ?></th>
			<td><?php echo $this->item->velocity_kmh; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_ACCEL_G'); ?></th>
			<td><?php echo $this->item->accel_g; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_--'); ?></th>
			<td><?php echo $this->item->--; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_PATTERN_HASH'); ?></th>
			<td><?php echo $this->item->pattern_hash; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_--'); ?></th>
			<td><?php echo $this->item->--; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_CREATED_AT'); ?></th>
			<td><?php echo $this->item->created_at; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_UPDATED_AT'); ?></th>
			<td>				<?php
			$date = $this->item->updated_at;
			echo $date > 0 ? HTMLHelper::_('date', $date, Text::_('DATE_FORMAT_LC4')) : '-';
			?>

			</td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_--'); ?></th>
			<td><?php echo $this->item->--; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_'')'); ?></th>
			<td><?php echo $this->item->''); ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_'')'); ?></th>
			<td><?php echo $this->item->''); ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_'')'); ?></th>
			<td><?php echo $this->item->''); ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_'')'); ?></th>
			<td><?php echo $this->item->''); ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_2}$''); ?></th>
			<td><?php echo $this->item->2}$'; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_STATE'); ?></th>
			<td>
			<i class="icon-<?php echo ($this->item->state == 1) ? 'publish' : 'unpublish'; ?>"></i></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_SIGHTING_CREATED_BY'); ?></th>
			<td><?php echo $this->item->created_by_name; ?></td>
		</tr>

	</table>

</div>

<?php $canCheckin = Factory::getApplication()->getIdentity()->authorise('core.manage', 'com_uforeporting.' . $this->item->id) || $this->item->checked_out == Factory::getApplication()->getIdentity()->id; ?>
	<?php if($canEdit && $this->item->checked_out == 0): ?>

	<a class="btn btn-outline-primary" href="<?php echo Route::_('index.php?option=com_uforeporting&task=sighting.edit&id='.$this->item->id); ?>"><?php echo Text::_("COM_UFOREPORTING_EDIT_ITEM"); ?></a>
	<?php elseif($canCheckin && $this->item->checked_out > 0) : ?>
	<a class="btn btn-outline-primary" href="<?php echo Route::_('index.php?option=com_uforeporting&task=sighting.checkin&id=' . $this->item->id .'&'. Session::getFormToken() .'=1'); ?>"><?php echo Text::_("JLIB_HTML_CHECKIN"); ?></a>

<?php endif; ?>

<?php if (Factory::getApplication()->getIdentity()->authorise('core.delete','com_uforeporting.sighting.'.$this->item->id)) : ?>

	<a class="btn btn-danger" rel="noopener noreferrer" href="#deleteModal" role="button" data-bs-toggle="modal">
		<?php echo Text::_("COM_UFOREPORTING_DELETE_ITEM"); ?>
	</a>

	<?php echo HTMLHelper::_(
                                    'bootstrap.renderModal',
                                    'deleteModal',
                                    array(
                                        'title'  => Text::_('COM_UFOREPORTING_DELETE_ITEM'),
                                        'height' => '50%',
                                        'width'  => '20%',
                                        
                                        'modalWidth'  => '50',
                                        'bodyHeight'  => '100',
                                        'footer' => '<button class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button><a href="' . Route::_('index.php?option=com_uforeporting&task=sighting.remove&id=' . $this->item->id, false, 2) .'" class="btn btn-danger">' . Text::_('COM_UFOREPORTING_DELETE_ITEM') .'</a>'
                                    ),
                                    Text::sprintf('COM_UFOREPORTING_DELETE_CONFIRM', $this->item->id)
                                ); ?>

<?php endif; ?>