<?php

namespace Ecommage\HelloWorld\Controller\Index;

use Ecommage\HelloWorld\Model\PostFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class DataModel extends Action
{
    protected $_pageFactory;

    protected $_postFactory;

    public function __construct(
        Context      $context,
        PageFactory $pageFactory,
        PostFactory     $postFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_postFactory = $postFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $post = $this->_postFactory->create();
        $post->load(3);
        echo "<pre>";
        print_r($post->getData());
        echo "</pre>";
//        $collection = $post->getCollection();
//        foreach($collection as $item){
//            echo "<pre>";
//            print_r($item->getData());
//            echo "</pre>";
//        }
        exit();
        return $this->_pageFactory->create();
    }
}
