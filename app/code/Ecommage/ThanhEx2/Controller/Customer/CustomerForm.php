<?php
namespace Ecommage\ThanhEx2\Controller\Customer;

class CustomerForm extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        /** @var \Magento\Framework\App\Response\Http $response */

        if (!$this->_objectManager->get('Magento\Customer\Model\Session')->isLoggedIn()) {
            $this->_redirect('customer/account/login');
            return;
        }

        // Your code to handle the form submission goes here
        return $this->_pageFactory->create();
    }
}
