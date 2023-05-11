<?php

namespace Ecommage\Validation\Observer;
use Ecommage\ThanhEx2\Model\PostFactory;
class CreateBlog implements \Magento\Framework\Event\ObserverInterface
{
    protected $postFactory;
    public function __construct(PostFactory $postFactory)
    {
        $this->postFactory=$postFactory;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $displayText = $observer->getData('customer');
        $customerEmail = $displayText->getEmail();
        $customerId = $displayText->getId();
        $model=$this->postFactory->create();
        $model->setTitle('Blog '.$customerEmail);
        $model->setAuthorId($displayText->getId());
        $model->setContent('hello '.$customerEmail);
        $model->setUrlKey('ghjkl');
        $model->setStatus('1');
        $model->save();
        return $this;
    }
}
