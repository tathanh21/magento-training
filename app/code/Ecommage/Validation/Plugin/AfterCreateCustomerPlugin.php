<?php
namespace Ecommage\Validation\Plugin;

use Magento\Customer\Model\Customer;
use Magento\Customer\Model\Session as CustomerSession;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Model\CustomerRegistry;
use Ecommage\ThanhEx2\Model\PostFactory;

class AfterCreateCustomerPlugin
{
    protected $_logger;
    protected $customerRepository;
    protected $customerRegistry;
    protected $customerSession;
    protected $postFactory;
    public function __construct( \Psr\Log\LoggerInterface $logger,CustomerRepositoryInterface $customerRepository, CustomerRegistry $customerRegistry,CustomerSession $customerSession,PostFactory $postFactory){
        $this->customerSession=$customerSession;
        $this->postFactory = $postFactory;
        $this->customerRepository = $customerRepository;
        $this->customerRegistry = $customerRegistry;
        $this->_logger = $logger;
    }
    public function afterSave(Customer $customer, $result)
    {
//        die('fghjk');
        $this->_logger->debug('abc');
        $customerEmail = $customer->getEmail();
//        die($customerEmail);
        // Check if the customer is newly created
            $model=$this->postFactory->create();
            $model->setTitle('Blog '.$customerEmail);
            $model->setAuthorId($customer->getId());
            $model->setContent('hello '.$customerEmail);
            $model->setUrlKey('ghjkl');
            $model->setStatus('1');
            $model->save();
            return $result;


    }
}
