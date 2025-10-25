<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_peerreview
 *
 * @copyright   (C) 2025 Academic Publishing System
 * @license     GNU General Public License version 2 or later
 */

namespace Joomla\Component\PeerReview\Administrator\Table;

defined('_JEXEC') or die;

use Joomla\CMS\Table\Table;
use Joomla\Database\DatabaseDriver;

class ArticleTable extends Table
{
    public function __construct(DatabaseDriver $db)
    {
        parent::__construct('#__peerreview_articles', 'id', $db);
        
        $this->setColumnAlias('published', 'published');
    }
    
    public function check()
    {
        // Set alias if not provided
        if (trim($this->alias) == '') {
            $this->alias = $this->title;
        }
        
        $this->alias = \JApplicationHelper::stringURLSafe($this->alias);
        
        if (trim(str_replace('-', '', $this->alias)) == '') {
            $this->alias = \JFactory::getDate()->format('Y-m-d-H-i-s');
        }
        
        // Set dates
        if (!$this->created) {
            $this->created = \JFactory::getDate()->toSql();
        }
        
        if (!$this->created_by) {
            $this->created_by = \JFactory::getUser()->id;
        }
        
        if ($this->id) {
            $this->modified = \JFactory::getDate()->toSql();
            $this->modified_by = \JFactory::getUser()->id;
        }
        
        return true;
    }
}