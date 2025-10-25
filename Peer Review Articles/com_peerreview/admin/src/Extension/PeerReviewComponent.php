<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_peerreview
 *
 * @copyright   (C) 2025 Academic Publishing System
 * @license     GNU General Public License version 2 or later
 */

namespace Joomla\Component\PeerReview\Administrator\Extension;

defined('_JEXEC') or die;

use Joomla\CMS\Extension\BootableExtensionInterface;
use Joomla\CMS\Extension\MVCComponent;
use Joomla\CMS\HTML\HTMLRegistryAwareTrait;
use Psr\Container\ContainerInterface;

class PeerReviewComponent extends MVCComponent implements BootableExtensionInterface
{
    use HTMLRegistryAwareTrait;
    
    public function boot(ContainerInterface $container): void
    {
        // Register HTML helpers if needed
    }
}