<?php

namespace AHT\Crud\Controller\Index;

class Save extends \Magento\Framework\App\Action\Action
{
     protected $_pageFactory;
     protected $_crudFactory;
     protected $_cacheTypeList;
     protected $_cacheFrontendPool;
     protected $_cache;

     public function __construct(
          \Magento\Framework\App\Action\Context $context,
          \Magento\Framework\View\Result\PageFactory $pageFactory,
          \AHT\Crud\Model\CrudFactory $crudFactory,
          \AHT\Crud\Block\CacheFont $CacheFont
     ) {
          $this->_pageFactory  = $pageFactory;
          $this->_crudFactory = $crudFactory;
          $this->_cache        = $CacheFont;
          return parent::__construct($context);
     }

     public function execute()
     {
          $crud = $this->_crudFactory->create();

          if (isset($_POST['btn_edit'])) {

               $id   = $this->getRequest()->getParam('id');
               $edit = $crud->load($id);

               $edit->setTitle($_POST['title']);
               $edit->setDetail($_POST['detail']);
               $edit->save();
          } elseif (isset($_POST['btn_create'])) {

               $crud->setTitle($_POST['title']);
               $crud->setDetail($_POST['detail']);
               $crud->save();
          }

          $this->_cache->delete_Cache();

          $resultRedirect = $this->resultRedirectFactory->create();
          $resultRedirect->setPath('crud/index/index');
          return $resultRedirect;
     }
}
