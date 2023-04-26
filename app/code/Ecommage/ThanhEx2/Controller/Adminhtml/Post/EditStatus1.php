<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Ecommage\ThanhEx2\Controller\Adminhtml\Post;

use Ecommage\ThanhEx2\Model\PostFactory;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Ui\Component\MassAction\Filter;

/**
 * Class MassDelete
 */
class EditStatus1 extends \Magento\Backend\App\Action implements HttpPostActionInterface
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */

    /**
     * @var Filter
     */
    protected $filter;

    /**
     * @var PostFactory
     */
    protected $postFactory;

    /**
     * @param Context $context
     * @param Filter $filter
     * @param PostFactory $postFactory
     */
    public function __construct(Context $context, Filter $filter, PostFactory $postFactory)
    {
        $this->filter = $filter;
        $this->postFactory = $postFactory;
        parent::__construct($context);
    }

    /**
     * Execute action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     * @throws \Magento\Framework\Exception\LocalizedException|\Exception
     */
    public function execute()
    {
        $count=0;
        $model = $this->postFactory->create();
//        $collectionSize = $collection->getSize();
        $id= $this->getRequest()->getParam('selected');
//     $collection->addFieldToFilter('id',1);
        foreach ($id as $item) {
            $data = $model->load($item);
            $data->setData('status','1')->save();
//            $block->setStatus('2')->save();
            $count++;
        }

        $this->messageManager->addSuccessMessage(__('A total of %1 record(s) have been Set Status Public.',$count));

        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('*/*/');
    }
}
