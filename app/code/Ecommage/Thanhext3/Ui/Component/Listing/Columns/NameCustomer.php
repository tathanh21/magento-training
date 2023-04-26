<?php

namespace Ecommage\Thanhext3\Ui\Component\Listing\Columns;

use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Ui\Component\Listing\Columns\Column;

class NameCustomer extends Column
{
    public function prepareDataSource(array $dataSource)
    {
//echo '<pre>';
//var_dump($dataSource);
//die();
        if(isset($dataSource['data']['items'])) {
            foreach($dataSource['data']['items'] as &$items) {
                $firstname = $items['firstname'];
                $lastname = $items['lastname'];
                $items['firstname'] = $firstname." ".$lastname;
            }
        }
        return $dataSource;

    }
}
