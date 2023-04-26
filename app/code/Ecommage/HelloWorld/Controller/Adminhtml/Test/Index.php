<?php
namespace Ecommage\HelloWorld\Controller\Adminhtml\Test;

class Index extends \Magento\Backend\App\Action
{
    protected $_pageFactory;
    protected $authorization;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Framework\AuthorizationInterface $authorization
    )
    {
        $this->authorization = $authorization;
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }


    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Ecommage_HelloWorld::post');

    }

public function execute()
    {
        return $this->_pageFactory->create();
    }

}
