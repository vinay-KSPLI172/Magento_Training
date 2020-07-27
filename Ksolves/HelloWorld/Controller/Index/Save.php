<?php
namespace Ksolves\HelloWorld\Controller\Index;
 
use Magento\Framework\App\Filesystem\DirectoryList;
 
class Save extends \Magento\Framework\App\Action\Action
{
     protected $_pageFactory;
     protected $_postFactory;
     protected $_filesystem;
     
 
     public function __construct(
          \Magento\Framework\App\Action\Context $context,
          \Magento\Framework\View\Result\PageFactory $pageFactory,
          \Ksolves\HelloWorld\Model\PostFactory $postFactory,
          \Magento\Framework\Filesystem $filesystem
          )
     {
          $this->_pageFactory = $pageFactory;
          $this->_postFactory = $postFactory;
          $this->_filesystem = $filesystem;
          return parent::__construct($context);
     }
 
     public function execute()
     {
               $input = $this->getRequest()->getPostValue();
               $post = $this->_postFactory->create();


               $data = [
               "name"         => strval($input['name']),
               "post_content" => strval($input['post-content']),
               "url_key"      => strval($input['url-key']),
               "tags"         => strval($input['tags']),
               "status"       => intval($input['status'])
          ];

               $post->addData($data)->save();
          

               
               return $this->_redirect('helloworld/index/index');       
 
     }
}
