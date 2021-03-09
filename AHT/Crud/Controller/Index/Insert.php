<?php

namespace AHT\Crud\Controller\Index;

class Insert extends \Magento\Framework\App\Action\Action
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
        return $this->_pageFactory->create();
    }
}
