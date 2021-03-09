<?php

namespace AHT\Crud\Model\ResourceModel\Crud;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'id';
	protected $_eventPrefix = 'aht_crud_collection';
	protected $_eventObject = 'crud_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('AHT\Crud\Model\Crud', 'AHT\Crud\Model\ResourceModel\Crud');
	}
}
