<?php
namespace Ecommage\ThanhEx1\Block;
class Index extends \Magento\Framework\View\Element\Template
{
    protected $_template = 'test.phtml';
    protected $helperData;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Ecommage\ThanhEx1\Helper\Data $helperData
    )
    {
        $this->helperData = $helperData;
        parent::__construct($context);
    }

    public function testData()
    {
        return $this->helperData->getGeneralConfig('display_text_test');
    }
}

