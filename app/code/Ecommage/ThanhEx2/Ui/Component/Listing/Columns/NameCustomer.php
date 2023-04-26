<?php

namespace Ecommage\ThanhEx2\Ui\Component\Listing\Columns;

use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Ui\Component\Listing\Columns\Column;

class NameCustomer extends Column
{
public function prepareDataSource(array $dataSource)
{
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
