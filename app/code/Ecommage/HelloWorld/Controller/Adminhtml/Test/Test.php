<?php
namespace Ecommage\HelloWorld\Controller\Adminhtml\Test;

use Magento\Backend\App\Action\Context;

class Test extends \Magento\Backend\App\Action
{
    protected $_pageFactory;

//    public function __construct(
//        \Magento\Framework\App\Action\Context $context,
//        \Magento\Framework\View\Result\PageFactory $pageFactory)
//    {
//        $this->
//        $this->_pageFactory = $pageFactory;
//    }
 public function __construct(Context $context,\Magento\Framework\View\Result\PageFactory $pageFactory)
 {
     $this->_pageFactory = $pageFactory;
     parent::__construct($context);
 }

    public function execute()
    {
        return $this->_pageFactory->create();
    }
}
