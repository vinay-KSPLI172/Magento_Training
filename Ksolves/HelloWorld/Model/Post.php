<?php
namespace Ksolves\HelloWorld\Model;
class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'Ksolves_post';

	protected $_cacheTag = 'Ksolves_post';

	protected $_eventPrefix = 'Ksolves_post';

	protected function _construct()
	{
		$this->_init('Ksolves\HelloWorld\Model\ResourceModel\Post');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}
