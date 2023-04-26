<?php
/**
// * Copyright © Magento, Inc. All rights reserved.
// * See COPYING.txt for license details.
// */
//namespace Ecommage\ThanhEx2\Ui\Component\Listing\Columns;
//
//use Magento\Framework\View\Element\UiComponent\ContextInterface;
//use Magento\Framework\View\Element\UiComponentFactory;
//use Magento\Ui\Component\Listing\Columns\Column;
//use Magento\Framework\UrlInterface;
//
///**
// * Class ProductActions for Listing Columns
// *
// * @api
// * @since 100.0.2
// */
//class Actions extends Column
//{
//    /**
//     * @var UrlInterface
//     */
//    protected $urlBuilder;
//
//    /**
//     * @param ContextInterface $context
//     * @param UiComponentFactory $uiComponentFactory
//     * @param UrlInterface $urlBuilder
//     * @param array $components
//     * @param array $data
//     */
//    public function __construct(
//        ContextInterface $context,
//        UiComponentFactory $uiComponentFactory,
//        UrlInterface $urlBuilder,
//        array $components = [],
//        array $data = []
//    ) {
//        $this->urlBuilder = $urlBuilder;
//        parent::__construct($context, $uiComponentFactory, $components, $data);
//    }
//
//    /**
//     * Prepare Data Source
//     *
//     * @param array $dataSource
//     * @return array
//     */
//    public function prepareDataSource(array $dataSource)
//    {
//        if (isset($dataSource['data']['items'])) {
//            $storeId = $this->context->getFilterParam('store_id');
//
//            foreach ($dataSource['data']['items'] as &$item) {
//                $item[$this->getData('name')]['edit'] = [
//                    'href' => $this->urlBuilder->getUrl(
//                        'catalog/product/edit',
//                        ['id' => $item['id'], 'store' => $storeId]
//                    ),
//                    'label' => __('Edit'),
//                    'hidden' => false,
//                ];
//            }
//        }
//
//        return $dataSource;
//    }
//}

/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Ecommage\Thanhext3\Ui\Component\Listing\Columns;

use Magento\Cms\Block\Adminhtml\Page\Grid\Renderer\Action\UrlBuilder;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\Escaper;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

/**
 * Class prepare Page Actions
 */
class Actions extends Column
{
    /** Url path */
    const CMS_URL_PATH_EDIT = 'thanhext3admin/post/edit';
    const CMS_URL_PATH_DELETE = 'thanhext3admin/post/delete';

    /**
     * @var \Magento\Cms\Block\Adminhtml\Page\Grid\Renderer\Action\UrlBuilder
     */
    protected $actionUrlBuilder;

    /**
     * @var \Magento\Cms\ViewModel\Page\Grid\UrlBuilder
     */
    private $scopeUrlBuilder;

    /**
     * @var \Magento\Framework\UrlInterface
     */
    protected $urlBuilder;

    /**
     * @var string
     */
    private $editUrl;

    /**
     * @var Escaper
     */
    private $escaper;

    /**
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlBuilder $actionUrlBuilder
     * @param UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     * @param string $editUrl
     * @param \Magento\Cms\ViewModel\Page\Grid\UrlBuilder|null $scopeUrlBuilder
     */
    public function __construct(
        ContextInterface                            $context,
        UiComponentFactory                          $uiComponentFactory,
        UrlBuilder                                  $actionUrlBuilder,
        UrlInterface                                $urlBuilder,
        array                                       $components = [],
        array                                       $data = [],
                                                    $editUrl = self::CMS_URL_PATH_EDIT,
        \Magento\Cms\ViewModel\Page\Grid\UrlBuilder $scopeUrlBuilder = null
    )
    {
        $this->urlBuilder = $urlBuilder;
        $this->actionUrlBuilder = $actionUrlBuilder;
        $this->editUrl = $editUrl;
        parent::__construct($context, $uiComponentFactory, $components, $data);
        $this->scopeUrlBuilder = $scopeUrlBuilder ?: ObjectManager::getInstance()
            ->get(\Magento\Cms\ViewModel\Page\Grid\UrlBuilder::class);
    }

    /**
     * @inheritDoc
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $name = $this->getData('name');
                if (isset($item['id'])) {
                    $item[$name]['edit'] = [
                        'href' => $this->urlBuilder->getUrl($this->editUrl, ['blog_id' => $item['id']]),
                        'label' => __('Edit'),
                    ];
                }
                if (isset($item['identifier'])) {
                    $item[$name]['preview'] = [
                        'href' => $this->scopeUrlBuilder->getUrl(
                            $item['identifier'],
                            isset($item['_first_store_id']) ? $item['_first_store_id'] : null,
                            isset($item['store_code']) ? $item['store_code'] : null
                        ),
                        'label' => __('View'),
                        'target' => '_blank'
                    ];
                }
            }
        }

        return $dataSource;
    }

    /**
     * Get instance of escaper
     *
     * @return Escaper
     * @deprecated 101.0.7
     */
    private function getEscaper()
    {
        if (!$this->escaper) {
            $this->escaper = ObjectManager::getInstance()->get(Escaper::class);
        }
        return $this->escaper;
    }
}

