<?php

namespace Ecommage\ThanhEx2\Controller\Customer;

use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Context;
use Magento\Customer\Model\Session as CustomerSession;
class CustomerDelete extends \Magento\Framework\App\Action\Action
{
    protected $postFactory;
    protected $customerSession;
    public function __construct(
        CustomerSession $customerSession,
        Context $context,
        \Ecommage\ThanhEx2\Model\PostFactory $postFactory
    ) {
        $this->customerSession = $customerSession;
        $this->postFactory = $postFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $authorId = $this->customerSession->getCustomerId();
        // 1. POST request : Get booking data
        $post = (array) $this->getRequest()->getParams();
        if (!empty($post)) {
            // Retrieve your form data
            $id   = $post['id'];
            $model=$this->postFactory->create();
            $model->load($id)->delete();

            // Doing-something with...

            // Display the succes form validation message
            $this->messageManager->addSuccessMessage('Delete done !');

            // Redirect to your form page (or anywhere you want...)
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl('/thanhex2/customer/customerlist');

            return $resultRedirect;
        }
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}
