<?php

namespace Ecommage\ThanhEx2\Controller\Customer;

use Ecommage\ThanhEx2\Model\PostFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Customer\Model\Session as CustomerSession;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\App\RequestInterface;


class CustomerSaveEdit extends Action
{
    private $resultJsonFactory;
    protected $postFactory;
    protected $customerSession;
    protected $request;
    public function __construct(
        RequestInterface $request,
        JsonFactory $resultJsonFactory,
        CustomerSession $customerSession,
        Context   $context,
        PostFactory $postFactory
    )
    {
        $this->request = $request;
        $this->resultJsonFactory = $resultJsonFactory;
        $this->customerSession = $customerSession;
        $this->postFactory = $postFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $authorId = $this->customerSession->getCustomerId();
        // 1. POST request : Get  data
        $data = $this->request->getParams();
//        echo '<pre>';
//        var_dump($data['id']);
//        die();

        $model = $this->postFactory->create()->load($data->getId());
        try {
            $model->setTitle($data['title'])
                ->setAuthorId($authorId)
                ->setUrlKey($data['url'])
                ->setContent($data['content'])
                ->setStatus($data['status'])->save();
            $resultJson = $this->resultJsonFactory->create();
            return $resultJson->setData(['json_data' => 'edit success']);
        }catch (Exception $e){
            return $resultJson->setData(['json_data' => 'edit fail']);
        }

        // Display the succes form validation message
        //     $this->messageManager->addSuccessMessage('Edit done !');

        // Redirect to your form page (or anywhere you want...)
//        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
//        $resultRedirect->setUrl('/thanhex2/customer/customerlist');
//
//        return $resultRedirect;
//
//        // 2. GET request : Render the booking page
//        $this->_view->loadLayout();
//        $this->_view->renderLayout();
    }
}
