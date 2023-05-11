<?php

namespace Ecommage\ThanhEx2\Observer;

class CustomerLogin implements \Magento\Framework\Event\ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        echo $pass = $observer->getData('password');
//        die();
       return $this;
    }
}
