<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Uforeporting
 * @author      Claude.ai, Eric D. Martin & Open.Ai <edm@252edmusmc.xyz>
 * @copyright   Claude.ai, Eric D. Martin & Open.Ai
 * @license    Open Source, Paid Support
 */
namespace Uforresporting\Component\Uforeporting\Api\Controller;

\defined('_JEXEC') or die;

use Joomla\CMS\MVC\Controller\ApiController;

/**
 * The Medias controller
 *
 * @since  1.0.0
 */
class MediasController extends ApiController 
{
	/**
	 * The content type of the item.
	 *
	 * @var    string
	 * @since  1.0.0
	 */
	protected $contentType = 'medias';

	/**
	 * The default view for the display method.
	 *
	 * @var    string
	 * @since  1.0.0
	 */
	protected $default_view = 'medias';
}