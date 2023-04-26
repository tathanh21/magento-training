<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Ecommage\ThanhEx2\Model\Post\Source;

use Magento\Framework\Data\OptionSourceInterface;

/**
 * Class IsActive
 */
class Status implements OptionSourceInterface
{
    const STATUS_PUBLIC = 1;
    const STATUS_DRAFT = 2;
    const STATUS_NON_PUBLIC = 3;

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $availableOptions = $this->getAvailableStatuses();
        $options = [];
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
    public function getAvailableStatuses()
    {
        return [self::STATUS_PUBLIC => __('Public'), self::STATUS_DRAFT => __('Draft'),self::STATUS_NON_PUBLIC=>__('Non Public')];
    }
}
