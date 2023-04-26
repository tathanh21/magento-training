<?php

namespace Ecommage\ThanhEx2\Controller\Customer;

use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Context;
use Magento\Customer\Model\Session as CustomerSession;
class CustomerSave extends \Magento\Framework\App\Action\Action
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
        $post = (array) $this->getRequest()->getPost();
        if (!empty($post)) {
            // Retrieve your form data
            $title   = $post['title'];
            $content = $post['content'];
            $url      = $post['url'];
            $status = $post['status'];
            $model=$this->postFactory->create();
            $model->setTitle($title);
            $model->setAuthorId($authorId);
            $model->setContent($content);
            $model->setUrlKey($url);
            $model->setStatus($status);
            $model->save();

            // Doing-something with...

            // Display the succes form validation message
            $this->messageManager->addSuccessMessage('Save done !');

            // Redirect to your form page (or anywhere you want...)
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl('/thanhex2/customer/customerform');

            return $resultRedirect;
        }
        // 2. GET request : Render the booking page
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}
