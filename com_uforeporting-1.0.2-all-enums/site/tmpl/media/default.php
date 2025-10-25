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
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_MEDIA_ID'); ?></th>
			<td><?php echo $this->item->id; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_MEDIA_SIGHTING_ID'); ?></th>
			<td><?php echo $this->item->sighting_id; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_MEDIA_KIND'); ?></th>
			<td><?php echo $this->item->kind; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_MEDIA_URI'); ?></th>
			<td><?php echo $this->item->uri; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_MEDIA_MIME'); ?></th>
			<td><?php echo $this->item->mime; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_MEDIA_CAPTURED_AT'); ?></th>
			<td><?php echo $this->item->captured_at; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_MEDIA_META'); ?></th>
			<td><?php echo $this->item->meta; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_MEDIA_CREATED_AT'); ?></th>
			<td><?php echo $this->item->created_at; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_MEDIA_STATE'); ?></th>
			<td>
			<i class="icon-<?php echo ($this->item->state == 1) ? 'publish' : 'unpublish'; ?>"></i></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_MEDIA_CREATED_BY'); ?></th>
			<td><?php echo $this->item->created_by_name; ?></td>
		</tr>

	</table>

</div>

<?php $canCheckin = Factory::getApplication()->getIdentity()->authorise('core.manage', 'com_uforeporting.' . $this->item->id) || $this->item->checked_out == Factory::getApplication()->getIdentity()->id; ?>
	<?php if($canEdit && $this->item->checked_out == 0): ?>

	<a class="btn btn-outline-primary" href="<?php echo Route::_('index.php?option=com_uforeporting&task=media.edit&id='.$this->item->id); ?>"><?php echo Text::_("COM_UFOREPORTING_EDIT_ITEM"); ?></a>
	<?php elseif($canCheckin && $this->item->checked_out > 0) : ?>
	<a class="btn btn-outline-primary" href="<?php echo Route::_('index.php?option=com_uforeporting&task=media.checkin&id=' . $this->item->id .'&'. Session::getFormToken() .'=1'); ?>"><?php echo Text::_("JLIB_HTML_CHECKIN"); ?></a>

<?php endif; ?>

<?php if (Factory::getApplication()->getIdentity()->authorise('core.delete','com_uforeporting.media.'.$this->item->id)) : ?>

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
                                        'footer' => '<button class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button><a href="' . Route::_('index.php?option=com_uforeporting&task=media.remove&id=' . $this->item->id, false, 2) .'" class="btn btn-danger">' . Text::_('COM_UFOREPORTING_DELETE_ITEM') .'</a>'
                                    ),
                                    Text::sprintf('COM_UFOREPORTING_DELETE_CONFIRM', $this->item->id)
                                ); ?>

<?php endif; ?>