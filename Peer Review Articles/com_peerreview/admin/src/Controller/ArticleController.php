<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_peerreview
 *
 * @copyright   (C) 2025 Academic Publishing System
 * @license     GNU General Public License version 2 or later
 */

namespace Joomla\Component\PeerReview\Administrator\Controller;

defined('_JEXEC') or die;

use Joomla\CMS\MVC\Controller\FormController;
use Joomla\CMS\Router\Route;

class ArticleController extends FormController
{
    protected $text_prefix = 'COM_PEERREVIEW_ARTICLE';
    
    public function generateAISuggestions()
    {
        $this->checkToken();
        
        $model = $this->getModel();
        $id = $this->input->getInt('id');
        
        if ($model->generateAISuggestions($id)) {
            $this->setMessage(\JText::_('COM_PEERREVIEW_AI_SUGGESTIONS_GENERATED'));
        } else {
            $this->setMessage($model->getError(), 'error');
        }
        
        $this->setRedirect(
            Route::_(
                'index.php?option=com_peerreview&view=article&layout=edit&id=' . $id,
                false
            )
        );
    }
}