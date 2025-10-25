<?php

/**
 * @version    CVS: 1.0.0
 * @package    Com_Uforeporting
 * @author      Claude.ai, Eric D. Martin & Open.Ai <edm@252edmusmc.xyz>
 * @copyright   Claude.ai, Eric D. Martin & Open.Ai
 * @license    Open Source, Paid Support
 */

namespace Uforresporting\Component\Uforeporting\Site\Service;

// No direct access
defined('_JEXEC') or die;

use Joomla\CMS\Component\Router\RouterViewConfiguration;
use Joomla\CMS\Component\Router\RouterView;
use Joomla\CMS\Component\Router\Rules\StandardRules;
use Joomla\CMS\Component\Router\Rules\NomenuRules;
use Joomla\CMS\Component\Router\Rules\MenuRules;
use Joomla\CMS\Factory;
use Joomla\CMS\Categories\Categories;
use Joomla\CMS\Application\SiteApplication;
use Joomla\CMS\Categories\CategoryFactoryInterface;
use Joomla\CMS\Categories\CategoryInterface;
use Joomla\Database\DatabaseInterface;
use Joomla\CMS\Menu\AbstractMenu;
use Joomla\CMS\Component\ComponentHelper;

/**
 * Class UforeportingRouter
 *
 */
class Router extends RouterView
{
	private $noIDs;
	/**
	 * The category factory
	 *
	 * @var    CategoryFactoryInterface
	 *
	 * @since  1.0.0
	 */
	private $categoryFactory;

	/**
	 * The category cache
	 *
	 * @var    array
	 *
	 * @since  1.0.0
	 */
	private $categoryCache = [];

	public function __construct(SiteApplication $app, AbstractMenu $menu, CategoryFactoryInterface $categoryFactory, DatabaseInterface $db)
	{
		$params = ComponentHelper::getParams('com_uforeporting');
		$this->noIDs = (bool) $params->get('sef_ids');
		$this->categoryFactory = $categoryFactory;
		
		
			$domains = new RouterViewConfiguration('domains');
			$this->registerView($domains);
			$ccDomain = new RouterViewConfiguration('domain');
			$ccDomain->setKey('id')->setParent($domains);
			$this->registerView($ccDomain);
			$domainform = new RouterViewConfiguration('domainform');
			$domainform->setKey('id');
			$this->registerView($domainform);
			$sightings = new RouterViewConfiguration('sightings');
			$this->registerView($sightings);
			$ccSighting = new RouterViewConfiguration('sighting');
			$ccSighting->setKey('id')->setParent($sightings);
			$this->registerView($ccSighting);
			$sightingform = new RouterViewConfiguration('sightingform');
			$sightingform->setKey('id');
			$this->registerView($sightingform);
			$medias = new RouterViewConfiguration('medias');
			$this->registerView($medias);
			$ccMedia = new RouterViewConfiguration('media');
			$ccMedia->setKey('id')->setParent($medias);
			$this->registerView($ccMedia);
			$mediaform = new RouterViewConfiguration('mediaform');
			$mediaform->setKey('id');
			$this->registerView($mediaform);
			$witnesses = new RouterViewConfiguration('witnesses');
			$this->registerView($witnesses);
			$ccWitnesse = new RouterViewConfiguration('witnesse');
			$ccWitnesse->setKey('id')->setParent($witnesses);
			$this->registerView($ccWitnesse);
			$witnesseform = new RouterViewConfiguration('witnesseform');
			$witnesseform->setKey('id');
			$this->registerView($witnesseform);

		parent::__construct($app, $menu);

		$this->attachRule(new MenuRules($this));
		$this->attachRule(new StandardRules($this));
		$this->attachRule(new NomenuRules($this));
	}


	
		/**
		 * Method to get the segment(s) for an domain
		 *
		 * @param   string  $id     ID of the domain to retrieve the segments for
		 * @param   array   $query  The request that is built right now
		 *
		 * @return  array|string  The segments of this item
		 */
		public function getDomainSegment($id, $query)
		{
			return array((int) $id => $id);
		}
			/**
			 * Method to get the segment(s) for an domainform
			 *
			 * @param   string  $id     ID of the domainform to retrieve the segments for
			 * @param   array   $query  The request that is built right now
			 *
			 * @return  array|string  The segments of this item
			 */
			public function getDomainformSegment($id, $query)
			{
				return $this->getDomainSegment($id, $query);
			}
		/**
		 * Method to get the segment(s) for an sighting
		 *
		 * @param   string  $id     ID of the sighting to retrieve the segments for
		 * @param   array   $query  The request that is built right now
		 *
		 * @return  array|string  The segments of this item
		 */
		public function getSightingSegment($id, $query)
		{
			return array((int) $id => $id);
		}
			/**
			 * Method to get the segment(s) for an sightingform
			 *
			 * @param   string  $id     ID of the sightingform to retrieve the segments for
			 * @param   array   $query  The request that is built right now
			 *
			 * @return  array|string  The segments of this item
			 */
			public function getSightingformSegment($id, $query)
			{
				return $this->getSightingSegment($id, $query);
			}
		/**
		 * Method to get the segment(s) for an media
		 *
		 * @param   string  $id     ID of the media to retrieve the segments for
		 * @param   array   $query  The request that is built right now
		 *
		 * @return  array|string  The segments of this item
		 */
		public function getMediaSegment($id, $query)
		{
			return array((int) $id => $id);
		}
			/**
			 * Method to get the segment(s) for an mediaform
			 *
			 * @param   string  $id     ID of the mediaform to retrieve the segments for
			 * @param   array   $query  The request that is built right now
			 *
			 * @return  array|string  The segments of this item
			 */
			public function getMediaformSegment($id, $query)
			{
				return $this->getMediaSegment($id, $query);
			}
		/**
		 * Method to get the segment(s) for an witnesse
		 *
		 * @param   string  $id     ID of the witnesse to retrieve the segments for
		 * @param   array   $query  The request that is built right now
		 *
		 * @return  array|string  The segments of this item
		 */
		public function getWitnesseSegment($id, $query)
		{
			return array((int) $id => $id);
		}
			/**
			 * Method to get the segment(s) for an witnesseform
			 *
			 * @param   string  $id     ID of the witnesseform to retrieve the segments for
			 * @param   array   $query  The request that is built right now
			 *
			 * @return  array|string  The segments of this item
			 */
			public function getWitnesseformSegment($id, $query)
			{
				return $this->getWitnesseSegment($id, $query);
			}

	
		/**
		 * Method to get the segment(s) for an domain
		 *
		 * @param   string  $segment  Segment of the domain to retrieve the ID for
		 * @param   array   $query    The request that is parsed right now
		 *
		 * @return  mixed   The id of this item or false
		 */
		public function getDomainId($segment, $query)
		{
			return (int) $segment;
		}
			/**
			 * Method to get the segment(s) for an domainform
			 *
			 * @param   string  $segment  Segment of the domainform to retrieve the ID for
			 * @param   array   $query    The request that is parsed right now
			 *
			 * @return  mixed   The id of this item or false
			 */
			public function getDomainformId($segment, $query)
			{
				return $this->getDomainId($segment, $query);
			}
		/**
		 * Method to get the segment(s) for an sighting
		 *
		 * @param   string  $segment  Segment of the sighting to retrieve the ID for
		 * @param   array   $query    The request that is parsed right now
		 *
		 * @return  mixed   The id of this item or false
		 */
		public function getSightingId($segment, $query)
		{
			return (int) $segment;
		}
			/**
			 * Method to get the segment(s) for an sightingform
			 *
			 * @param   string  $segment  Segment of the sightingform to retrieve the ID for
			 * @param   array   $query    The request that is parsed right now
			 *
			 * @return  mixed   The id of this item or false
			 */
			public function getSightingformId($segment, $query)
			{
				return $this->getSightingId($segment, $query);
			}
		/**
		 * Method to get the segment(s) for an media
		 *
		 * @param   string  $segment  Segment of the media to retrieve the ID for
		 * @param   array   $query    The request that is parsed right now
		 *
		 * @return  mixed   The id of this item or false
		 */
		public function getMediaId($segment, $query)
		{
			return (int) $segment;
		}
			/**
			 * Method to get the segment(s) for an mediaform
			 *
			 * @param   string  $segment  Segment of the mediaform to retrieve the ID for
			 * @param   array   $query    The request that is parsed right now
			 *
			 * @return  mixed   The id of this item or false
			 */
			public function getMediaformId($segment, $query)
			{
				return $this->getMediaId($segment, $query);
			}
		/**
		 * Method to get the segment(s) for an witnesse
		 *
		 * @param   string  $segment  Segment of the witnesse to retrieve the ID for
		 * @param   array   $query    The request that is parsed right now
		 *
		 * @return  mixed   The id of this item or false
		 */
		public function getWitnesseId($segment, $query)
		{
			return (int) $segment;
		}
			/**
			 * Method to get the segment(s) for an witnesseform
			 *
			 * @param   string  $segment  Segment of the witnesseform to retrieve the ID for
			 * @param   array   $query    The request that is parsed right now
			 *
			 * @return  mixed   The id of this item or false
			 */
			public function getWitnesseformId($segment, $query)
			{
				return $this->getWitnesseId($segment, $query);
			}

	/**
	 * Method to get categories from cache
	 *
	 * @param   array  $options   The options for retrieving categories
	 *
	 * @return  CategoryInterface  The object containing categories
	 *
	 * @since   1.0.0
	 */
	private function getCategories(array $options = []): CategoryInterface
	{
		$key = serialize($options);

		if (!isset($this->categoryCache[$key]))
		{
			$this->categoryCache[$key] = $this->categoryFactory->createCategory($options);
		}

		return $this->categoryCache[$key];
	}
}
