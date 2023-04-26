<?php
namespace Ecommage\Thanhext3\Block\Customer;

use Ecommage\Thanhext3\Model\ResourceModel\Post\CollectionFactory;
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

        $collection = $this->_countryCollectionFactory->create();

        return   $collection;

    }

}

?>
