<?php
namespace Ksolves\HelloWorld\Controller\Index;
 
class Edit extends \Magento\Framework\App\Action\Action
{
     protected $_pageFactory;
     protected $_objectManager;
     protected $_request;
     protected $_coreRegistry;
 
     public function __construct(
          \Magento\Framework\App\Action\Context $context,
          \Magento\Framework\View\Result\PageFactory $pageFactory,
          \Magento\Framework\App\Request\Http $request,
          \Ksolves\HelloWorld\Model\PostFactory $postFactory,
          \Magento\Framework\ObjectManagerInterface $objectManager,
          \Magento\Framework\Registry $coreRegistry
          )
     {
          $this->_pageFactory = $pageFactory;
          $this->_request = $request;
          $this->_coreRegistry = $coreRegistry;
          $this->_postFactory = $postFactory;
          $this->_objectManager = $objectManager;
          return parent::__construct($context);
     }
 
     public function execute()
     {
        $id = $this->_request->getParam('id');

        $model = $this->_objectManager->create('Ksolves\HelloWorld\Model\Post');

        $model->load($id);
          
        
        $model->setName('Magento Edit');

        $model->save();

        return $this->_redirect('helloworld/index/index');

     }
     
}
