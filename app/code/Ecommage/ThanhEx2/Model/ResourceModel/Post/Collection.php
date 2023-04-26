<?php
namespace Ecommage\ThanhEx2\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    protected function _construct()
    {
        $this->_init('Ecommage\ThanhEx2\Model\Post', 'Ecommage\ThanhEx2\Model\ResourceModel\Post');
    }

    public function _initSelect(){
        parent::_initSelect();
        $this->getSelect()->join(
            ['b' => $this->getTable('customer_entity')],
            'main_table.author_id = b.entity_id',
            ['email' => 'b.email','customerid'=>'b.entity_id'],
        )->join(
            ['a' => $this->getTable('customer_entity')],
            'main_table.author_id = a.entity_id',
            ['firstname' => 'a.firstname', 'lastname' => 'a.lastname'],
        );;
//        $this->setPageSize(3);
        $size= $this->getSize();
        $items = $this->getData();
        $data = [
            'totalRecords' => $size,
            'items' => array_values($items),
        ];
        return $data;

    }

}
