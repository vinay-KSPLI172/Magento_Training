<?php
namespace Ksolves\News\Block\Adminhtml;

class Allnews extends \Magento\Backend\Block\Widget\Grid\Container
{
    protected function _construct()
    {
        $this->_controller = 'adminhtml_allnews';
        $this->_blockGroup = 'Ksolves_News';
        $this->_headerText = __('Manage News');

        parent::_construct();

        if ($this->_isAllowedAction('Ksolves_News::save')) {
            $this->buttonList->update('add', 'label', __('Add News'));
        } else {
            $this->buttonList->remove('add');
        }
    }

    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
}
?>
