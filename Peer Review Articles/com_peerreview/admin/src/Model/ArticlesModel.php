<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_peerreview
 *
 * @copyright   (C) 2025 Academic Publishing System
 * @license     GNU General Public License version 2 or later
 */

namespace Joomla\Component\PeerReview\Administrator\Model;

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Model\ListModel;
use Joomla\Database\ParameterType;

class ArticlesModel extends ListModel
{
    public function __construct($config = [])
    {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = [
                'id', 'a.id',
                'title', 'a.title',
                'alias', 'a.alias',
                'status', 'a.status',
                'category_id', 'a.category_id',
                'published', 'a.published',
                'created', 'a.created',
                'modified', 'a.modified',
                'submission_date', 'a.submission_date',
                'publication_date', 'a.publication_date',
                'author_name'
            ];
        }
        
        parent::__construct($config);
    }
    
    protected function populateState($ordering = 'a.created', $direction = 'DESC')
    {
        $search = $this->getUserStateFromRequest($this->context . '.filter.search', 'filter_search');
        $this->setState('filter.search', $search);
        
        $status = $this->getUserStateFromRequest($this->context . '.filter.status', 'filter_status', '');
        $this->setState('filter.status', $status);
        
        $categoryId = $this->getUserStateFromRequest($this->context . '.filter.category_id', 'filter_category_id', '');
        $this->setState('filter.category_id', $categoryId);
        
        $published = $this->getUserStateFromRequest($this->context . '.filter.published', 'filter_published', '');
        $this->setState('filter.published', $published);
        
        parent::populateState($ordering, $direction);
    }
    
    protected function getStoreId($id = '')
    {
        $id .= ':' . $this->getState('filter.search');
        $id .= ':' . $this->getState('filter.status');
        $id .= ':' . $this->getState('filter.category_id');
        $id .= ':' . $this->getState('filter.published');
        
        return parent::getStoreId($id);
    }
    
    protected function getListQuery()
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true);
        
        $query->select([
            'a.*',
            $db->quoteName('c.title', 'category_title'),
            $db->quoteName('u.name', 'author_name'),
            $db->quoteName('uc.name', 'editor_name')
        ])
        ->from($db->quoteName('#__peerreview_articles', 'a'))
        ->leftJoin($db->quoteName('#__peerreview_categories', 'c') . ' ON c.id = a.category_id')
        ->leftJoin($db->quoteName('#__users', 'u') . ' ON u.id = a.author_id')
        ->leftJoin($db->quoteName('#__users', 'uc') . ' ON uc.id = a.checked_out');
        
        // Filter by search
        $search = $this->getState('filter.search');
        if (!empty($search)) {
            $search = $db->quote('%' . str_replace(' ', '%', $db->escape(trim($search), true) . '%'));
            $query->where('(a.title LIKE ' . $search . ' OR a.alias LIKE ' . $search . ')');
        }
        
        // Filter by status
        $status = $this->getState('filter.status');
        if (is_numeric($status)) {
            $query->where($db->quoteName('a.status') . ' = :status')
                ->bind(':status', $status, ParameterType::INTEGER);
        }
        
        // Filter by category
        $categoryId = $this->getState('filter.category_id');
        if (is_numeric($categoryId)) {
            $query->where($db->quoteName('a.category_id') . ' = :categoryId')
                ->bind(':categoryId', $categoryId, ParameterType::INTEGER);
        }
        
        // Filter by published state
        $published = $this->getState('filter.published');
        if (is_numeric($published)) {
            $query->where($db->quoteName('a.published') . ' = :published')
                ->bind(':published', $published, ParameterType::INTEGER);
        } elseif ($published === '') {
            $query->where($db->quoteName('a.published') . ' IN (0, 1)');
        }
        
        // Add list ordering
        $orderCol = $this->state->get('list.ordering', 'a.created');
        $orderDirn = $this->state->get('list.direction', 'DESC');
        
        $query->order($db->escape($orderCol) . ' ' . $db->escape($orderDirn));
        
        return $query;
    }
}