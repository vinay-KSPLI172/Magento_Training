<?php
namespace Ksolves\HelloWorld\Block;
 
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Ksolves\HelloWorld\Model\PostFactory;
 
class Index extends Template
{
    protected $customCollection;
    
    public function __construct(Context $context, PostFactory $customCollection)
    {
        $this->customCollection = $customCollection;
       
        parent::__construct($context);
    }
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        $this->pageConfig->getTitle()->set(__('Ksolves_Post  Pagination'));
        if ($this->getCustomCollection()) {
            $pager = $this->getLayout()->createBlock(
                'Magento\Theme\Block\Html\Pager',
                'ksolves.helloworld.pager'
            )->setAvailableLimit([5 => 5, 10 => 10, 15 => 15, 20 => 20])
                ->setShowPerPage(true)->setCollection(
                    $this->getCustomCollection()
                );
            $this->setChild('pager', $pager);
            $this->getCustomCollection()->load();
        }
        return $this;
    }
    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }
    public function getCustomCollection()
    {
        $page = ($this->getRequest()->getParam('p')) ? $this->getRequest()->getParam('p') : 1;
        $pageSize = ($this->getRequest()->getParam('limit')) ? $this->getRequest(
            
        )->getParam('limit') : 5;
        $collection = $this->customCollection->create()->getCollection();
        $collection->setPageSize($pageSize);
        $collection->setCurPage($page);
        return $collection;
    }
}
