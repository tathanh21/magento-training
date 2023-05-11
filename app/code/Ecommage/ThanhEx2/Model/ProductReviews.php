<?php
namespace Ecommage\ThanhEx2\Model;
use Magento\Framework\Model\AbstractModel;
class ProductReviews extends AbstractModel{

    protected $_ratingFactory;
    protected $_productFactory;
    protected $_reviewFactory;
    protected $_storeManager;

    public function __construct(
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Catalog\Model\ProductFactory $productFactory,
        \Magento\Review\Model\RatingFactory $ratingFactory,
        \Magento\Review\Model\ResourceModel\Review\CollectionFactory $reviewFactory
        ) {
        $this->_storeManager = $storeManager;
        $this->_productFactory = $productFactory;
        $this->_ratingFactory = $ratingFactory;
        $this->_reviewFactory = $reviewFactory;
    }

    public function getReviewCollection($productId){
        $collection = $this->_reviewFactory->create()
            ->addStatusFilter(
                \Magento\Review\Model\Review::STATUS_APPROVED
            )->addEntityFilter(
                'product',
                $productId
            )->setDateOrder();

    }

    public function getRatingCollection(){
        $ratingCollection = $this->_ratingFactory->create()
            ->getResourceCollection()
            ->addEntityFilter(
                'product'
            )->setPositionOrder()->setStoreFilter(
                $this->_storeManager->getStore()->getId()
            )->addRatingPerStoreName(
                $this->_storeManager->getStore()->getId()
            )->load();

        return $ratingCollection->getData();
    }

}
