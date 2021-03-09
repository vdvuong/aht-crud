<?php

namespace AHT\Crud\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
	protected $_crudFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\AHT\Crud\Model\CrudFactory $crudFactory
	) {
		$this->_pageFactory  = $pageFactory;
		$this->_crudFactory = $crudFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
		// $crud = $this->_crudFactory->create();
		// $collection = $crud->getCollection();
		// foreach($collection as $item){
		// 	echo "<pre>";
		// 	print_r($item->getData());
		// 	echo "</pre>";
		// }
		// exit();
		return $this->_pageFactory->create();
	}
}
