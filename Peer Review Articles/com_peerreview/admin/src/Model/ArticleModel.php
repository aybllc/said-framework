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
use Joomla\CMS\Form\Form;
use Joomla\CMS\MVC\Model\AdminModel;
use Joomla\CMS\Table\Table;

class ArticleModel extends AdminModel
{
    protected $text_prefix = 'COM_PEERREVIEW';
    
    public function getTable($name = 'Article', $prefix = 'Administrator', $options = [])
    {
        return parent::getTable($name, $prefix, $options);
    }
    
    public function getForm($data = [], $loadData = true)
    {
        $form = $this->loadForm(
            'com_peerreview.article',
            'article',
            ['control' => 'jform', 'load_data' => $loadData]
        );
        
        if (empty($form)) {
            return false;
        }
        
        return $form;
    }
    
    protected function loadFormData()
    {
        $data = Factory::getApplication()->getUserState('com_peerreview.edit.article.data', []);
        
        if (empty($data)) {
            $data = $this->getItem();
            
            // Process JSON fields
            if (!empty($data->metadata)) {
                $data->metadata = json_decode($data->metadata, true);
            }
            
            if (!empty($data->ai_suggestions)) {
                $data->ai_suggestions = json_decode($data->ai_suggestions, true);
            }
        }
        
        $this->preprocessData('com_peerreview.article', $data);
        
        return $data;
    }
    
    public function save($data)
    {
        // Process JSON fields before saving
        if (isset($data['metadata']) && is_array($data['metadata'])) {
            $data['metadata'] = json_encode($data['metadata']);
        }
        
        if (isset($data['ai_suggestions']) && is_array($data['ai_suggestions'])) {
            $data['ai_suggestions'] = json_encode($data['ai_suggestions']);
        }
        
        return parent::save($data);
    }
    
    public function generateAISuggestions($id)
    {
        $article = $this->getItem($id);
        
        if (!$article || !$article->id) {
            $this->setError('Article not found');
            return false;
        }
        
        // AI suggestion generation hook
        $suggestions = $this->callAIService($article);
        
        $db = $this->getDbo();
        $query = $db->getQuery(true)
            ->update($db->quoteName('#__peerreview_articles'))
            ->set($db->quoteName('ai_suggestions') . ' = ' . $db->quote(json_encode($suggestions)))
            ->where($db->quoteName('id') . ' = ' . (int) $id);
        
        try {
            $db->setQuery($query);
            $db->execute();
        } catch (\Exception $e) {
            $this->setError($e->getMessage());
            return false;
        }
        
        return true;
    }
    
    protected function callAIService($article)
    {
        // Placeholder for AI service integration
        // This would connect to your AI service API
        return [
            'keywords' => ['suggested', 'keywords', 'from', 'AI'],
            'improvements' => [
                'clarity' => 'Consider restructuring the abstract for better flow',
                'technical' => 'Add more references to support claims in section 3'
            ],
            'similar_papers' => [
                ['title' => 'Related Paper 1', 'doi' => '10.1234/example1'],
                ['title' => 'Related Paper 2', 'doi' => '10.1234/example2']
            ],
            'generated_at' => date('Y-m-d H:i:s')
        ];
    }
}