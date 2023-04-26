<?php
namespace Ecommage\ThanhEx2\Controller\Customer;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;

class CustomController extends Action
{
    protected $resultFactory;

    public function __construct(
        Context $context,
        ResultFactory $resultFactory
    ) {
        parent::__construct($context);
        $this->resultFactory = $resultFactory;
    }

    public function execute()
    {
        echo 'asdf';
        $data = $this->getRequest()->getParam('id');
        echo '<pre>';
        var_dump($data);
        die();
        $resultJson = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        $resultJson->setData($data);
        return $resultJson;
    }
}
