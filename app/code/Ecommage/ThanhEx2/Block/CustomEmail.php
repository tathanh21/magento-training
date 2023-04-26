<?php
namespace Ecommage\ThanhEx2\Block;
use Magento\Framework\View\Element\Template;
class CustomEmail extends \Magento\Framework\View\Element\Template
{
    public function __construct(\Magento\Framework\View\Element\Template\Context $context)
    {
        parent::__construct($context);
    }
    public function action(){
        return 'post';
    }
}
?>
