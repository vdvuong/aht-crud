<?php

namespace AHT\Crud\Block;

class Insert extends \Magento\Framework\View\Element\Template
{
    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */

    protected $_pageFactory;
    protected $_crudFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
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
