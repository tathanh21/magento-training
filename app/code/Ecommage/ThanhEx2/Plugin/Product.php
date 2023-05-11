<?php

namespace Ecommage\ThanhEx2\Plugin;

class Product
{
    public function afterGetPrice(\Magento\Catalog\Model\Product $subject, $result)
    {
        $result += 10; //add your product price logic

        return $result;
    }
}

