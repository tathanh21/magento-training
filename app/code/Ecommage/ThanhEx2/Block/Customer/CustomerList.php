<?php
namespace Ecommage\ThanhEx2\Block\Customer;

use Ecommage\ThanhEx2\Model\ResourceModel\Post\CollectionFactory;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\View\Element\Template;
use Magento\Customer\Model\Session;

class CustomerList extends Template

{

    protected $_CollectionFactory;
    protected $session;
    protected $customerId;

    public function __construct(CollectionFactory $CollectionFactory, Context $context, array $data = [],Session $session)

    {
        $this->session = $session;
        $this->customerId = $this->session->getCustomerId();
        $this->_CollectionFactory = $CollectionFactory;
        parent::__construct($context, $data);

    }

    public function getCollection()

    {

        $collection = $this->_CollectionFactory->create();
        $collection->addFieldToFilter('author_id', $this->customerId);
        $collection->setOrder('created_at', 'desc');
        return  $collection->load()->getData();

    }
    public  function  getStatus($status){
        if ($status == '1') {
            echo 'Public';
        } elseif ($status == '2') {
            echo 'Draft';
        } else {
            echo 'Non_public';
        }

    }

}

?>
