<?php

namespace AHT\Crud\Model;


class Crud extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG         = 'crud';

	protected $_cacheTag    = 'crud';

	protected $_eventPrefix = 'crud';

	protected function _construct()
	{
		$this->_init('AHT\Crud\Model\ResourceModel\Crud');
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
