<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Uforeporting
 * @author      Claude.ai, Eric D. Martin & Open.Ai <edm@252edmusmc.xyz>
 * @copyright   Claude.ai, Eric D. Martin & Open.Ai
 * @license    Open Source, Paid Support
 */

namespace Uforresporting\Component\Uforeporting\Api\View\Vehicles;

\defined('_JEXEC') or die;

use Joomla\CMS\MVC\View\JsonApiView as BaseApiView;

/**
 * The Vehicles view
 *
 * @since  1.0.0
 */
class JsonApiView extends BaseApiView
{
	/**
	 * The fields to render item in the documents
	 *
	 * @var    array
	 * @since  1.0.0
	 */
	protected $fieldsToRenderItem = [
		'code', 
		'name', 
		'definition', 
		'id', 
		'state', 
		'ordering', 
		'created_by', 
	];

	/**
	 * The fields to render items in the documents
	 *
	 * @var    array
	 * @since  1.0.0
	 */
	protected $fieldsToRenderList = [
		'code', 
		'name', 
		'definition', 
		'id', 
		'state', 
		'ordering', 
		'created_by', 
	];
}