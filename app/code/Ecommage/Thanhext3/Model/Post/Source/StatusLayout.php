<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Ecommage\Thanhext3\Model\Post\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Magento\Framework\View\Model\PageLayout\Config\BuilderInterface;

/**
 * Class PageLayout
 */
class StatusLayout implements OptionSourceInterface
{
    /**
     * @var \Magento\Framework\View\Model\PageLayout\Config\BuilderInterface
     */
    protected $pageLayoutBuilder;

    /**
     * @var array
     * @deprecated 103.0.1 since the cache is now handled by \Magento\Theme\Model\PageLayout\Config\Builder::$configFiles
     */
    protected $options;

    /**
     * Constructor
     *
     * @param BuilderInterface $pageLayoutBuilder
     */
    public function __construct(BuilderInterface $pageLayoutBuilder)
    {
        $this->pageLayoutBuilder = $pageLayoutBuilder;
    }

    /**
     * @inheritdoc
     */
    public function toOptionArray()
    {
        $configOptions = $this->pageLayoutBuilder->getPageLayoutsConfig()->getOptions();

        $options = [
            [
                'label' => 'publish',
                'value' => 1,
            ],
            [
                'label' => 'draft',
                'value' => 2,
            ],
            [
                'label' => 'non-publish',
                'value' => 3,
            ],
        ];

        $this->options = $options;

        return $options;
    }
}
