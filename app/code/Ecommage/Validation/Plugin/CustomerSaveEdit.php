<?php

namespace Ecommage\Validation\Plugin;

use Closure;
use Ecommage\ThanhEx2\Model\PostFactory;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Message\ManagerInterface;


class CustomerSaveEdit
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
        die('asdf');
        $badwords = ['deal','wtf','xxx'];
        foreach ($badwords as $badword){
            if (strpos($postData['content'], $badword) !== false){
                throw new \Magento\Framework\Exception\LocalizedException(
                    __('Bad words acquired, please update')
                );
            }

        }
    }
}
