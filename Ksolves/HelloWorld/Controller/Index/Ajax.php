<?php


namespace Ksolves\HelloWorld\Controller\Index;


use Ksolves\HelloWorld\Model\PostFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Ajax extends Action
{

    protected $_resultPageFactory;
    protected $_resultPostFactory;

    public function __construct(Context $context, PageFactory $resultPageFactory, \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
                                PostFactory $postFactory)
    {
        $this->_resultPostFactory = $postFactory;
        $this->resultJsonFactory = $resultJsonFactory;
        $this->_resultPageFactory = $resultPageFactory;
        return parent::__construct($context);
    }


    public function execute()
    {

        $search_text = $this->getRequest()->getParam('search_text');
        $resultstring = "";
        if ($search_text) {
            $post = $this->_resultPostFactory->create()->getCollection()->addFieldToFilter('name', ['like' => '%' . $search_text . '%']);
            foreach ($post as $key => $posts) {
                $name = '<div style="width:900px; margin:0 auto;">
        
    
 <table>
     <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Created At</th>
          <th>Updated At</th>
     </tr>'.
 
     '<tr>'.
          '<td>'.$posts->getData('post_id').'</td>'.
          '<td>'.$posts->getData('name').'</td>'.
          '<td>'.$posts->getData('created_at').'</td>'.
          '<td>'.$posts->getData('updated_at').'</td>'.
         
     '</tr>
     
</table>
</div>';
                $resultstring = $resultstring . "<br/> " . $name;
            }
        }
        $result = $this->resultJsonFactory->create();
        $result->setData($resultstring);
        return $result;
    }
}



