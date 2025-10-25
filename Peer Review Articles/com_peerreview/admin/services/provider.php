<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_peerreview
 *
 * @copyright   (C) 2025 Academic Publishing System
 * @license     GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

use Joomla\CMS\Component\Router\RouterFactoryInterface;
use Joomla\CMS\Dispatcher\ComponentDispatcherFactoryInterface;
use Joomla\CMS\Extension\ComponentInterface;
use Joomla\CMS\Extension\Service\Provider\ComponentDispatcherFactory;
use Joomla\CMS\Extension\Service\Provider\MVCFactory;
use Joomla\CMS\Extension\Service\Provider\RouterFactory;
use Joomla\CMS\HTML\Registry;
use Joomla\CMS\MVC\Factory\MVCFactoryInterface;
use Joomla\Component\PeerReview\Administrator\Extension\PeerReviewComponent;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;

return new class implements ServiceProviderInterface
{
    public function register(Container $container): void
    {
        $container->registerServiceProvider(new MVCFactory('\\Joomla\\Component\\PeerReview'));
        $container->registerServiceProvider(new ComponentDispatcherFactory('\\Joomla\\Component\\PeerReview'));
        $container->registerServiceProvider(new RouterFactory('\\Joomla\\Component\\PeerReview'));
        
        $container->set(
            ComponentInterface::class,
            function (Container $container) {
                $component = new PeerReviewComponent($container->get(ComponentDispatcherFactoryInterface::class));
                
                $component->setRegistry($container->get(Registry::class));
                $component->setMVCFactory($container->get(MVCFactoryInterface::class));
                $component->setRouterFactory($container->get(RouterFactoryInterface::class));
                
                return $component;
            }
        );
    }
};