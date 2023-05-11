<?php

namespace Ecommage\ThanhEx2\Observer;

use mysql_xdevapi\Exception;

class CustomSave implements \Magento\Framework\Event\ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $display = $observer->getData('page');
//        var_dump($display->getData());
//        die();
//        die($display->getTitle());
    if ($display->getId()){
        return $this;
    }

        $a = '- '.$display->getTitle();
        $display->setTitle($a);
        return $this;

    }
}
