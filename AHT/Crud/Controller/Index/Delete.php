<?php

namespace AHT\Crud\Controller\Index;


class Delete extends \Magento\Framework\App\Action\Action
{

    protected $_pageFactory;
    protected $_crudFactory;
    protected $resultRedirect;
    protected $_cache;


    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \AHT\Crud\Model\CrudFactory $crudFactory,
        \Magento\Framework\Controller\ResultFactory $result,
        \AHT\Crud\Block\CacheFont $CacheFont
    ) {
        $this->_pageFactory   = $pageFactory;
        $this->_crudFactory  = $crudFactory;
        $this->resultRedirect = $result;
        $this->_cache         = $CacheFont;

        return parent::__construct($context);
    }

    public function execute()
    {

        $id     = $this->getRequest()->getParam('id');
        $delete = $this->_crudFactory->create()->load($id);
        $delete->delete();

        $this->_cache->delete_Cache();

        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('crud/index/index');
        return $resultRedirect;
    }
}
