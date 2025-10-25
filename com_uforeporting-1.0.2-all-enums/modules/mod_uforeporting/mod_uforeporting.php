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

use Joomla\CMS\Factory;
use Joomla\CMS\Helper\ModuleHelper;
use Uforresporting\Module\Uforeporting\Site\Helper\UforeportingHelper;

$wa = Factory::getApplication()->getDocument()->getWebAssetManager();
$wr = $wa->getRegistry();
$wr->addRegistryFile('media/mod_uforeporting/joomla.asset.json');
$wa->useStyle('mod_uforeporting.style')
    ->useScript('mod_uforeporting.script');

require ModuleHelper::getLayoutPath('mod_uforeporting', $params->get('content_type', 'blank'));
