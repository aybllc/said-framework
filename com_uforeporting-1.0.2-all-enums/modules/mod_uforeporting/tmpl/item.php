<?php
/**
 * @version     CVS: 1.0.0
 * @package     com_uforeporting
 * @subpackage  mod_uforeporting
 * @author       Claude.ai, Eric D. Martin & Open.Ai <edm@252edmusmc.xyz>
 * @copyright    Claude.ai, Eric D. Martin & Open.Ai
 * @license     Open Source, Paid Support
 */
defined('_JEXEC') or die;

use Uforresporting\Module\Uforeporting\Site\Helper\UforeportingHelper;

$element = UforeportingHelper::getItem($params);
?>

<?php if (!empty($element)) : ?>
	<div>
		<?php $fields = get_object_vars($element); ?>
		<?php foreach ($fields as $field_name => $field_value) : ?>
			<?php if (UforeportingHelper::shouldAppear($field_name)): ?>
				<div class="row">
					<div class="span4">
						<strong><?php echo UforeportingHelper::renderTranslatableHeader($params->get('item_table'), $field_name); ?></strong>
					</div>
					<div
						class="span8"><?php echo UforeportingHelper::renderElement($params->get('item_table'), $field_name, $field_value); ?></div>
				</div>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
<?php endif;
