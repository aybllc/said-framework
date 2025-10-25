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

$wa = $this->document->getWebAssetManager();
$wa->useScript('keepalive')
	->useScript('form.validate');
HTMLHelper::_('bootstrap.tooltip');
?>

<form
	action="<?php echo Route::_('index.php?option=com_uforeporting&layout=edit&id=' . (int) $this->item->id); ?>"
	method="post" enctype="multipart/form-data" name="adminForm" id="sighting-form" class="form-validate form-horizontal">

	
	<?php echo HTMLHelper::_('uitab.startTabSet', 'myTab', array('active' => 'sighting')); ?>
	<?php echo HTMLHelper::_('uitab.addTab', 'myTab', 'sighting', Text::_('COM_UFOREPORTING_TAB_SIGHTING', true)); ?>
	<div class="row-fluid">
		<div class="col-md-12 form-horizontal">
			<fieldset class="adminform">
				<legend><?php echo Text::_('COM_UFOREPORTING_FIELDSET_SIGHTING'); ?></legend>
				<?php echo $this->form->renderField('id'); ?>
				<?php echo $this->form->renderField('session_id'); ?>
				<?php echo $this->form->renderField('occurred_at'); ?>
				<?php echo $this->form->renderField('--'); ?>
				<?php echo $this->form->renderField('obs_mod'); ?>
				<?php echo $this->form->renderField('obs_substrate'); ?>
				<?php echo $this->form->renderField('obs_kin'); ?>
				<?php echo $this->form->renderField('obs_sens'); ?>
				<?php echo $this->form->renderField('obs_occ'); ?>
				<?php echo $this->form->renderField('obs_veh'); ?>
				<?php echo $this->form->renderField('--'); ?>
				<?php echo $this->form->renderField('obj_mod'); ?>
				<?php echo $this->form->renderField('obj_substrate'); ?>
				<?php echo $this->form->renderField('behavior_code'); ?>
				<?php echo $this->form->renderField('speed_mod'); ?>
				<?php echo $this->form->renderField('shape_code'); ?>
				<?php echo $this->form->renderField('size_mod'); ?>
				<?php echo $this->form->renderField('--'); ?>
				<?php echo $this->form->renderField('confidence'); ?>
				<?php echo $this->form->renderField('--'); ?>
				<?php echo $this->form->renderField('longitude'); ?>
				<?php echo $this->form->renderField('elevation_m'); ?>
				<?php echo $this->form->renderField('alt_ft'); ?>
				<?php echo $this->form->renderField('depth_m'); ?>
				<?php echo $this->form->renderField('flight_level'); ?>
				<?php echo $this->form->renderField('velocity_kmh'); ?>
				<?php echo $this->form->renderField('accel_g'); ?>
				<?php echo $this->form->renderField('--'); ?>
				<?php echo $this->form->renderField('pattern_hash'); ?>
				<?php echo $this->form->renderField('--'); ?>
				<?php echo $this->form->renderField('created_at'); ?>
				<?php echo $this->form->renderField('updated_at'); ?>
				<?php echo $this->form->renderField('--'); ?>
				<?php echo $this->form->renderField(''')'); ?>
				<?php echo $this->form->renderField(''')'); ?>
				<?php echo $this->form->renderField(''')'); ?>
				<?php echo $this->form->renderField(''')'); ?>
				<?php echo $this->form->renderField('2}$''); ?>
				<?php echo $this->form->renderField('state'); ?>
				<?php echo $this->form->renderField('created_by'); ?>
				<?php if ($this->state->params->get('save_history', 1)) : ?>
					<div class="control-group">
						<div class="control-label"><?php echo $this->form->getLabel('version_note'); ?></div>
						<div class="controls"><?php echo $this->form->getInput('version_note'); ?></div>
					</div>
				<?php endif; ?>
			</fieldset>
		</div>
	</div>
	<?php echo HTMLHelper::_('uitab.endTab'); ?>

	<?php if (Factory::getApplication()->getIdentity()->authorise('core.admin','uforeporting')) : ?>
	<?php echo HTMLHelper::_('uitab.addTab', 'myTab', 'permissions', Text::_('JGLOBAL_ACTION_PERMISSIONS_LABEL', true)); ?>
		<?php echo $this->form->getInput('rules'); ?>
	<?php echo HTMLHelper::_('uitab.endTab'); ?>
<?php endif; ?>
	<?php echo HTMLHelper::_('uitab.endTabSet'); ?>

	<input type="hidden" name="task" value=""/>
	<?php echo HTMLHelper::_('form.token'); ?>

</form>
