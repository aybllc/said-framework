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
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_DOMAIN_CODE'); ?></th>
			<td><?php echo $this->item->code; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_DOMAIN_NAME'); ?></th>
			<td><?php echo $this->item->name; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_DOMAIN_DESCRIPTION'); ?></th>
			<td><?php echo $this->item->description; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_DOMAIN_MINUS_RANGE'); ?></th>
			<td><?php echo $this->item->minus_range; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_DOMAIN_EQUAL_RANGE'); ?></th>
			<td><?php echo $this->item->equal_range; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_DOMAIN_PLUS_RANGE'); ?></th>
			<td><?php echo $this->item->plus_range; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_DOMAIN_STATE'); ?></th>
			<td>
			<i class="icon-<?php echo ($this->item->state == 1) ? 'publish' : 'unpublish'; ?>"></i></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_DOMAIN_ID'); ?></th>
			<td><?php echo $this->item->id; ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_UFOREPORTING_FORM_LBL_DOMAIN_CREATED_BY'); ?></th>
			<td><?php echo $this->item->created_by_name; ?></td>
		</tr>

	</table>

</div>

<?php $canCheckin = Factory::getApplication()->getIdentity()->authorise('core.manage', 'com_uforeporting.' . $this->item->id) || $this->item->checked_out == Factory::getApplication()->getIdentity()->id; ?>
	<?php if($canEdit && $this->item->checked_out == 0): ?>

	<a class="btn btn-outline-primary" href="<?php echo Route::_('index.php?option=com_uforeporting&task=domain.edit&id='.$this->item->id); ?>"><?php echo Text::_("COM_UFOREPORTING_EDIT_ITEM"); ?></a>
	<?php elseif($canCheckin && $this->item->checked_out > 0) : ?>
	<a class="btn btn-outline-primary" href="<?php echo Route::_('index.php?option=com_uforeporting&task=domain.checkin&id=' . $this->item->id .'&'. Session::getFormToken() .'=1'); ?>"><?php echo Text::_("JLIB_HTML_CHECKIN"); ?></a>

<?php endif; ?>

<?php if (Factory::getApplication()->getIdentity()->authorise('core.delete','com_uforeporting.domain.'.$this->item->id)) : ?>

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
                                        'footer' => '<button class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button><a href="' . Route::_('index.php?option=com_uforeporting&task=domain.remove&id=' . $this->item->id, false, 2) .'" class="btn btn-danger">' . Text::_('COM_UFOREPORTING_DELETE_ITEM') .'</a>'
                                    ),
                                    Text::sprintf('COM_UFOREPORTING_DELETE_CONFIRM', $this->item->id)
                                ); ?>

<?php endif; ?>