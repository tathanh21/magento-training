<?php
namespace Ecommage\Thanhext3\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    protected function _construct()
    {
        $this->_init('Ecommage\Thanhext3\Model\Post', 'Ecommage\Thanhext3\Model\ResourceModel\Post');
    }

}
