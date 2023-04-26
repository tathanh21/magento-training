<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Ecommage\Thanhext3\Ui\Component\Listing;

use Ecommage\Thanhext3\Model\ResourceModel\Post\CollectionFactory;
use Magento\Framework\Api\Filter;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\Search\SearchCriteriaBuilder;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\AuthorizationInterface;
use Magento\Framework\View\Element\UiComponent\DataProvider\DataProvider;
use Magento\Framework\View\Element\UiComponent\DataProvider\Reporting;
use Magento\Ui\Component\Container;

/**
 * DataProvider for cms ui.
 */
class DataListing extends DataProvider
{
    protected $collectionFactory;
    /**
     * @var AuthorizationInterface
     */
    private $authorization;
    /**
     * @var AddFilterInterface[]
     */
    private $additionalFilterPool;

    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param Reporting $reporting
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param RequestInterface $request
     * @param FilterBuilder $filterBuilder
     * @param array $meta
     * @param array $data
     * @param array $additionalFilterPool
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        Reporting $reporting,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        RequestInterface $request,
        FilterBuilder $filterBuilder,
        array $meta = [],
        array $data = [],
        array $additionalFilterPool = [],
        CollectionFactory $collectionFactory
    )
    {

        parent::__construct(
            $name,
            $primaryFieldName,
            $requestFieldName,
            $reporting,
            $searchCriteriaBuilder,
            $request,
            $filterBuilder,
            $meta,
            $data
        );
        $this->collectionFactory = $collectionFactory;
        $this->meta = array_replace_recursive($meta, $this->prepareMetadata());
        $this->additionalFilterPool = $additionalFilterPool;
    }

    /**
     * Prepares Meta
     *
     * @return array
     */
    public function prepareMetadata()
    {
        $metadata = [];

        if (!$this->getAuthorizationInstance()->isAllowed('Magento_Cms::save')) {
            $metadata = [
                'cms_page_columns' => [
                    'arguments' => [
                        'data' => [
                            'config' => [
                                'editorConfig' => [
                                    'enabled' => false
                                ],
                                'componentType' => Container::NAME
                            ]
                        ]
                    ]
                ]
            ];
        }

        return $metadata;
    }

    /**
     * Get authorization info.
     *
     * @return AuthorizationInterface|mixed
     * @deprecated 101.0.7
     */
    private function getAuthorizationInstance()
    {
        if ($this->authorization === null) {
            $this->authorization = ObjectManager::getInstance()->get(AuthorizationInterface::class);
        }
        return $this->authorization;
    }

    /**
     * @inheritdoc
     */
    public function addFilter(Filter $filter)
    {
        if (!empty($this->additionalFilterPool[$filter->getField()])) {
            $this->additionalFilterPool[$filter->getField()]->addFilter($this->searchCriteriaBuilder, $filter);
        } else {
            parent::addFilter($filter);
        }
    }

    public function getData()
    {
//        if (!$this->getCollection()->isLoaded()) {
//            $this->getCollection()->load();
//        }
//        $items = $this->getCollection()->toArray();
//
//        $data = [
//            'totalRecords' => $this->getCollection()->getSize(),
//            'items' => array_values($items),
//        ];
//
//        /** @var ModifierInterface $modifier */
//        foreach ($this->modifiersPool->getModifiersInstances() as $modifier) {
//            $data = $modifier->modifyData($data);
//        }
//
//        return $data;


        $collection = $this->collectionFactory->create();
        $sql = $collection->getSelect()->join(
            ['a' => $collection->getTable('admin_user')],
            'main_table.author_id = a.user_id',
            ['firstname' => 'a.firstname', 'lastname' => 'a.lastname'],
        );

        $size= $collection->getSize();
        $items = $collection->getData();
        $data = [
            'totalRecords' => $size,
            'items' => array_values($items),
        ];
        return $data;

        echo '<pre>';
        var_dump($data);
        die();
        // return $collection->getData();
        echo '<pre>';
        var_dump($collection->getData());
        die();


//        $this->collection->getSelect()->joinLeft(
//            ['admin'=>$collection->getTable('admin_user')],
//            'main_table.admin_user_id = admin.user_id',
//            ['admin_username'=>'admin.username']);
    }


}
