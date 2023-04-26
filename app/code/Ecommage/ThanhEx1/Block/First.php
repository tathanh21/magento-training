<?php
namespace Ecommage\ThanhEx1\Block;
use Magento\Framework\View\Element\Template;

class First extends \Magento\Framework\View\Element\Template
{
public function __construct(Template\Context $context, array $data = [])
{
    parent::__construct($context, $data);
}

    public function getTextFirstModule()
    {
        return __('Hello test');
    }
}
