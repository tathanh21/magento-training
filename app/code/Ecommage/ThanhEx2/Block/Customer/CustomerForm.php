<?php
namespace Ecommage\ThanhEx2\Block\Customer;

use Ecommage\ThanhEx2\Model\ResourceModel\Post\CollectionFactory;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\View\Element\Template;

class CustomerForm extends Template

{

    protected $_AuthorCollectionFactory;

    public function __construct(CollectionFactory $authorCollectionFactory, Context $context, array $data = [])

    {

        $this->_AuthorCollectionFactory = $authorCollectionFactory;
        parent::__construct($context, $data);

    }

    public function getAuthor()

    {

        return $this->getAuthorCollection()->toOptionArray();

    }

    public function getAuthorCollection()

    {

        $collection = $this->_AuthorCollectionFactory->create();
        return  $collection->getData();

    }

}

?>
