<?php

namespace Ecommage\HelloWorld\Controller\Index;

use Magento\Framework\App\Action\Context;

class ActionName extends \Magento\Framework\App\Action\Action
{
    public function __construct(Context $context,
      \Magento\Framework\Controller\Result\RedirectFactory $resultRedirectFactory,
  \Magento\Framework\Controller\Result\ForwardFactory $resultForwardFactory
    )
    {
        $this->resultForwardFactory = $resultForwardFactory;
        // $this->resultRedirectFactory = $resultRedirectFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $result = $this->resultForwardFactory->create();
        $result->forward('ex5');
        return $result;
//
//        $resultRedirect = $this->resultRedirectFactory->create();
//        $resultRedirect->setUrl('https://www.google.com');
//        return $resultRedirect;
    }
}
