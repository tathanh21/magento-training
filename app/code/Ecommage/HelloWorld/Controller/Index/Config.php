<?php

namespace Ecommage\HelloWorld\Controller\Index;

class Config extends \Magento\Framework\App\Action\Action
{

    protected $helperData;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Ecommage\HelloWorld\Helper\Data $helperData,
 \Magento\Framework\Controller\Result\ForwardFactory $forwardFactory,
\Magento\Framework\Controller\Result\RedirectFactory $resultRedirectFactory

    )
    {
        $this->helperData = $helperData;
        $this->_forwardFactory = $forwardFactory;
        $this->resultRedirectFactory = $resultRedirectFactory;
        return parent::__construct($context);
    }

    public function execute()
    {

        // TODO: Implement execute() method.

        if($this->helperData->getGeneralConfig('enable')){
            echo $this->helperData->getGeneralConfig('general2/textcon');
            exit();
        }else{
//            $resultForward = $this->_forwardFactory->create();
//            $resultForward->setController('index');
//            $resultForward->forward('defaultNoRoute');
//            return $resultForward;
            $result = $this->resultRedirectFactory->create();
            $result->setPath('helloworld/index/test');
            return $result;
        }

    }
}

