<?php
namespace Ksolves\News\Controller\Adminhtml\Allnews;

class Index extends \Magento\Backend\App\Action
{
	protected $resultPageFactory;

	protected $allNewsFactory;
	
	protected $helperData;
	
	public function __construct(
		\Magento\Backend\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory,
		\Ksolves\News\Helper\Data $helperData,
		\Ksolves\News\Model\AllnewsFactory $allNewsFactory
	) {
		parent::__construct($context);
		$this->resultPageFactory = $resultPageFactory;
		$this->helperData = $helperData;
		$this->allNewsFactory = $allNewsFactory;
	}

	public function execute()
	{
		/*echo $this->helperData->getStorefrontConfig('news_link');
		exit();*/
		/*$allnews = $this->allNewsFactory->create();
		$newsCollection = $allnews->getCollection();
		
		echo '<pre>';print_r($newsCollection->getData());
		*/
		
		$resultPage = $this->resultPageFactory->create();
		$resultPage->getConfig()->getTitle()->prepend(__('All News'));
		
		return $resultPage;
	}
}
?>
