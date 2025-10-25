<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_peerreview
 *
 * @copyright   (C) 2025 Academic Publishing System
 * @license     GNU General Public License version 2 or later
 */

namespace Joomla\Component\PeerReview\Administrator\View\Article;

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Helper\ContentHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
use Joomla\CMS\Toolbar\ToolbarHelper;

class HtmlView extends BaseHtmlView
{
    protected $form;
    protected $item;
    protected $state;
    
    public function display($tpl = null)
    {
        $this->form = $this->get('Form');
        $this->item = $this->get('Item');
        $this->state = $this->get('State');
        
        if (count($errors = $this->get('Errors'))) {
            throw new \Exception(implode("\n", $errors), 500);
        }
        
        $this->addToolbar();
        
        parent::display($tpl);
    }
    
    protected function addToolbar()
    {
        Factory::getApplication()->input->set('hidemainmenu', true);
        
        $user = Factory::getUser();
        $isNew = ($this->item->id == 0);
        $canDo = ContentHelper::getActions('com_peerreview');
        
        ToolbarHelper::title(
            Text::_('COM_PEERREVIEW_' . ($isNew ? 'ARTICLE_NEW' : 'ARTICLE_EDIT')),
            'article'
        );
        
        if ($canDo->get('core.edit') || $canDo->get('core.create')) {
            ToolbarHelper::apply('article.apply');
            ToolbarHelper::save('article.save');
            
            if ($canDo->get('core.create')) {
                ToolbarHelper::save2new('article.save2new');
            }
        }
        
        if (!$isNew && $canDo->get('core.create')) {
            ToolbarHelper::save2copy('article.save2copy');
        }
        
        if ($this->item->id && $canDo->get('core.edit')) {
            ToolbarHelper::custom('article.generateAISuggestions', 'cog', '', 'COM_PEERREVIEW_GENERATE_AI_SUGGESTIONS', false);
        }
        
        ToolbarHelper::cancel('article.cancel', $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE');
    }
}