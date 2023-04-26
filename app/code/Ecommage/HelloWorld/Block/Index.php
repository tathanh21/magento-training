<?php
namespace Ecommage\HelloWorld\Block;
class Index extends \Magento\Framework\View\Element\Template
{

    public function __construct(\Magento\Framework\View\Element\Template\Context $context)
    {
        parent::__construct($context);
        $this->setTemplate('Ecommage_HelloWorld::index.phtml');
    }

    public  function  test(){
      echo "abc";
  }
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magento_AdminNotification::show_list');
    }
}
