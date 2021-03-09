<?php

namespace AHT\Crud\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
	protected $_crudFactory;

	public function __construct(\AHT\Crud\Model\CrudFactory $crudFactory)
	{
		$this->_crudFactory = $crudFactory;
	}

	public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	{

		$data = [
			'title'		=> "Test",
			'detail'    => "Crud Test"
		];

		$crud = $this->_crudFactory->create();
		$crud->addData($data)->save();
	}
}
