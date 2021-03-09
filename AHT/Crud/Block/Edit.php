<?php

namespace AHT\Crud\Block;

class Edit extends \Magento\Framework\View\Element\Template
{
    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    protected $_pageFactory;
    protected $_crudFactory;
    protected $_request;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \AHT\Crud\Model\CrudFactory $crudFactory,
        \Magento\Framework\App\Request\Http $request
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_crudFactory = $crudFactory;
        $this->_request = $request;
        return parent::__construct($context);
    }

    public function execute()
    {
        return $this->_pageFactory->create();
    }

    public function getId()
    {

        $urlId = $this->_request->getParam('id');
        return $urlId;
    }

    public function getCrud($fieldName)
    {
        $crud = $this->_crudFactory->create()->load($this->getId());
        $name  = $crud->getData($fieldName);
        return $name;
    }
}
