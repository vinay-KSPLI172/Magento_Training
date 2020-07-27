<?php
namespace Ksolves\News\Model\ResourceModel\Allnews;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'news_id';
	
	protected $_eventPrefix = 'news_allnews_collection';

    protected $_eventObject = 'allnews_collection';
	
	/**
     * Define model & resource model
     */
	protected function _construct()
	{
		$this->_init('Ksolves\News\Model\Allnews', 'Ksolves\News\Model\ResourceModel\Allnews');
	}
}
?>
