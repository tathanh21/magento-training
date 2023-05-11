<?php

namespace Ecommage\Validation\Plugin;

use Closure;
use Ecommage\ThanhEx2\Model\PostFactory;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\Phrase;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;
use phpDocumentor\Reflection\Types\This;

class CustomerSave
{
    protected $request;
    protected $messageManager;
    protected $redirectFactory;
    protected $postFactory;
    protected $resultFactory;

    public function __construct(
        RequestInterface $request,
        ManagerInterface $messageManager,
        RedirectFactory  $redirectFactory,
        PostFactory      $postFactory,
        ResultFactory $resultFactory
    )
    {
        $this->resultFactory= $resultFactory;
        $this->request = $request;
        $this->messageManager = $messageManager;
        $this->redirectFactory = $redirectFactory;
        $this->postFactory = $postFactory;
    }

    public function beforeValidateBeforeSave(\Ecommage\ThanhEx2\Model\Post $post){
        $postData = $this->request->getPostValue();
//        var_dump($postData);
//        die();ch
        $badwords = ['deal','wtf','xxx'];
        foreach ($badwords as $badword){
            if (strpos($postData['content'], $badword) !== false){
                throw new \Magento\Framework\Exception\LocalizedException(
                    __('Bad words acquired, please update')
                );
                }
        }
    }

//    public function aroundExecute(
//        \Ecommage\ThanhEx2\Controller\Customer\CustomerSave $subject,
//        Closure                                            $proceed
//    )
//    {
//        $postData = $this->request->getPostValue();
//        $badwords = ['deal','wtf','xxx'];
//        foreach ($badwords as $badword){
//            if (strpos($postData['content'], $badword) !== false){
//                $this->messageManager->addErrorMessage('Bad words acquired, please update');
//                die('Bad words acquired, please update');
//                // Redirect to your form page (or anywhere you want...)
//                $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
//                $resultRedirect->setPath('thanhex2/customer/customerform');
//                return $resultRedirect;
//            }
//        }
//        return $proceed();
//
//    }
}
