<?php
namespace Ecommage\ThanhEx1\Block;

use Magento\Framework\View\Element\Template;

class MyBlock extends Template
{
public function __construct(Template\Context $context, array $data = [])
{
    parent::__construct($context, $data);
}

    public function getTitle()
    {
        return "Hello, World!";
    }
}
