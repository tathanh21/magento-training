<?php
namespace Ecommage\Validation\Block\Test;
class Test extends \Magento\Framework\View\Element\Template
{

    public function __construct(\Magento\Framework\View\Element\Template\Context $context)
    {
        parent::__construct($context);
    }

    public  function  test(){
        echo "abc 123";
    }
}
