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

$elements = UforeportingHelper::getList($params);

$tableField = explode(':', $params->get('field'));
$table_name = !empty($tableField[0]) ? $tableField[0] : '';
$field_name = !empty($tableField[1]) ? $tableField[1] : '';
?>

<?php if (!empty($elements)) : ?>
	<table class="jcc-table">
		<?php foreach ($elements as $element) : ?>
			<tr>
				<th><?php echo UforeportingHelper::renderTranslatableHeader($table_name, $field_name); ?></th>
				<td><?php echo UforeportingHelper::renderElement(
						$table_name, $params->get('field'), $element->{$field_name}
					); ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
<?php endif;
