<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_peerreview
 *
 * @copyright   (C) 2025 Academic Publishing System
 * @license     GNU General Public License version 2 or later
 */

namespace Joomla\Component\PeerReview\Administrator\View\Articles;

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Helper\ContentHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
use Joomla\CMS\Toolbar\Toolbar;
use Joomla\CMS\Toolbar\ToolbarHelper;

class HtmlView extends BaseHtmlView
{
    protected $items;
    protected $pagination;
    protected $state;
    protected $filterForm;
    protected $activeFilters;
    
    public function display($tpl = null)
    {
        $this->items = $this->get('Items');
        $this->pagination = $this->get('Pagination');
        $this->state = $this->get('State');
        $this->filterForm = $this->get('FilterForm');
        $this->activeFilters = $this->get('ActiveFilters');
        
        if (count($errors = $this->get('Errors'))) {
            throw new \Exception(implode("\n", $errors), 500);
        }
        
        $this->addToolbar();
        
        parent::display($tpl);
    }
    
    protected function addToolbar()
    {
        $canDo = ContentHelper::getActions('com_peerreview');
        $user = Factory::getUser();
        
        ToolbarHelper::title(Text::_('COM_PEERREVIEW_ARTICLES_TITLE'), 'article');
        
        $toolbar = Toolbar::getInstance('toolbar');
        
        if ($canDo->get('core.create')) {
            $toolbar->addNew('article.add');
        }
        
        if ($canDo->get('core.edit.state')) {
            $dropdown = $toolbar->dropdownButton('status-group')
                ->text('JTOOLBAR_CHANGE_STATUS')
                ->toggleSplit(false)
                ->icon('icon-ellipsis-h')
                ->buttonClass('btn btn-action')
                ->listCheck(true);
            
            $childBar = $dropdown->getChildToolbar();
            
            $childBar->publish('articles.publish')->listCheck(true);
            $childBar->unpublish('articles.unpublish')->listCheck(true);
            $childBar->archive('articles.archive')->listCheck(true);
            
            if ($canDo->get('core.admin')) {
                $childBar->checkin('articles.checkin')->listCheck(true);
            }
            
            if ($canDo->get('core.delete')) {
                $childBar->trash('articles.trash')->listCheck(true);
            }
        }
        
        if ($canDo->get('core.admin') || $canDo->get('core.options')) {
            $toolbar->preferences('com_peerreview');
        }
    }
}