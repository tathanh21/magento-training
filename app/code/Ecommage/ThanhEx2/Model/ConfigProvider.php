<?php

namespace Ecommage\ThanhEx2\Model;

use Magento\Checkout\Model\ConfigProviderInterface;
use Magento\Framework\View\LayoutInterface;

class ConfigProvider implements ConfigProviderInterface
{
    /** @var LayoutInterface  */
    protected $_layout;

    public function __construct(LayoutInterface $layout)
    {
        $this->_layout = $layout;
    }

    public function getConfig()
    {
        $myBlockId = "testBlock"; // CMS Block Identifier
        //$myBlockId = 20; // CMS Block ID

        return [
            'my_block_content' => $this->_layout->createBlock('Magento\Cms\Block\Block')->setBlockId($myBlockId)->toHtml()
        ];
    }
}
