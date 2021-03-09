<?php

namespace AHT\Crud\Block;


class Index extends \Magento\Framework\View\Element\Template
{
     protected $_crudFactory;

     public function __construct(
          \Magento\Framework\View\Element\Template\Context $context,
          \AHT\Crud\Model\CrudFactory $crudFactory
     ) {
          parent::__construct($context);
          $this->_crudFactory = $crudFactory;
     }

     public function getAll()
     {
          $crud      = $this->_crudFactory->create();
          $collection = $crud->getCollection();
          return $collection;
     }
}
