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
use \Uforresporting\Component\Uforeporting\Site\Helper\UforeportingHelper;

$wa = $this->document->getWebAssetManager();
$wa->useScript('keepalive')
	->useScript('form.validate');
HTMLHelper::_('bootstrap.tooltip');

// Load admin language file
$lang = Factory::getLanguage();
$lang->load('com_uforeporting', JPATH_SITE);

$user    = Factory::getApplication()->getIdentity();
$canEdit = UforeportingHelper::canUserEdit($this->item, $user);


if($this->item->state == 1){
	$state_string = 'Publish';
	$state_value = 1;
} else {
	$state_string = 'Unpublish';
	$state_value = 0;
}
if($this->item->id) {
	$canState = Factory::getApplication()->getIdentity()->authorise('core.edit.state','com_uforeporting.sighting');
} else {
	$canState = Factory::getApplication()->getIdentity()->authorise('core.edit.state','com_uforeporting.sighting.'.$this->item->id);
}
?>

<div class="sighting-edit front-end-edit">

<?php if ($this->params->get('show_page_heading')) : ?>
    <div class="page-header">
        <h1> <?php echo $this->escape($this->params->get('page_heading')); ?> </h1>
    </div>
    <?php endif;?>
	<?php if (!$canEdit) : ?>
		<h3>
		<?php throw new \Exception(Text::_('COM_UFOREPORTING_ERROR_MESSAGE_NOT_AUTHORISED'), 403); ?>
		</h3>
	<?php else : ?>
		<?php if (!empty($this->item->id)): ?>
			<h1><?php echo Text::sprintf('COM_UFOREPORTING_EDIT_ITEM_TITLE', $this->item->id); ?></h1>
		<?php else: ?>
			<h1><?php echo Text::_('COM_UFOREPORTING_ADD_ITEM_TITLE'); ?></h1>
		<?php endif; ?>

		<form id="form-sighting"
			  action="<?php echo Route::_('index.php?option=com_uforeporting&task=sightingform.save'); ?>"
			  method="post" class="form-validate form-horizontal" enctype="multipart/form-data">
			
	<?php echo HTMLHelper::_('uitab.startTabSet', 'myTab', array('active' => 'sighting')); ?>
	<?php echo HTMLHelper::_('uitab.addTab', 'myTab', 'sighting', Text::_('COM_UFOREPORTING_TAB_SIGHTING', true)); ?>
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

	<div class="control-group">
		<?php if(!$canState): ?>
			<div class="control-label"><?php echo $this->form->getLabel('state'); ?></div>
			<div class="controls"><?php echo $state_string; ?></div>
			<input type="hidden" name="jform[state]" value="<?php echo $state_value; ?>" />
		<?php else: ?>
			<div class="control-label"><?php echo $this->form->getLabel('state'); ?></div>
			<div class="controls"><?php echo $this->form->getInput('state'); ?></div>
		<?php endif; ?>
	</div>

	<?php echo $this->form->renderField('created_by'); ?>

	<?php echo HTMLHelper::_('uitab.endTab'); ?>
			<div class="control-group">
				<div class="controls">

					<?php if ($this->canSave): ?>
						<button type="submit" class="validate btn btn-primary">
							<span class="fas fa-check" aria-hidden="true"></span>
							<?php echo Text::_('JSUBMIT'); ?>
						</button>
					<?php endif; ?>
					<a class="btn btn-danger"
					   href="<?php echo Route::_('index.php?option=com_uforeporting&task=sightingform.cancel'); ?>"
					   title="<?php echo Text::_('JCANCEL'); ?>">
					   <span class="fas fa-times" aria-hidden="true"></span>
						<?php echo Text::_('JCANCEL'); ?>
					</a>
				</div>
			</div>

			<input type="hidden" name="option" value="com_uforeporting"/>
			<input type="hidden" name="task"
				   value="sightingform.save"/>
			<?php echo HTMLHelper::_('form.token'); ?>
		</form>
	<?php endif; ?>
</div>
