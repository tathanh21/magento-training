<?php
namespace Ecommage\ThanhEx2\Block\Customer;

use Ecommage\ThanhEx2\Model\PostFactory;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\View\Element\Template;
use Ecommage\ThanhEx2\Model\ResourceModel\Post\CollectionFactory;

class CustomerEdit extends Template

{
    protected $_AuthorCollectionFactory;

    protected $_postFactory;

    public function __construct(CollectionFactory $authorCollectionFactory, PostFactory $postFactory, Context $context, array $data = [])

    {
        $this->_AuthorCollectionFactory = $authorCollectionFactory;
        $this->_postFactory = $postFactory;
        parent::__construct($context, $data);

    }

    public function getCustomer()

    {
        $customer = $this->getRequest()->getParam('id');
        return  $this->_postFactory->create()->load($customer);
    }
    public function getAuthorCollection()

    {

        $collection = $this->_AuthorCollectionFactory->create();
        return  $collection->getData();

    }
}

?>
