<?php
namespace Magento\Framework\Data\Collection\Filesystem;

/**
 * Interceptor class for @see \Magento\Framework\Data\Collection\Filesystem
 */
class Interceptor extends \Magento\Framework\Data\Collection\Filesystem implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\Data\Collection\EntityFactoryInterface $entityFactory)
    {
        $this->___init();
        parent::__construct($entityFactory);
    }

    /**
     * {@inheritdoc}
     */
    public function getCurPage($displacement = 0)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCurPage');
        return $pluginInfo ? $this->___callPlugins('getCurPage', func_get_args(), $pluginInfo) : parent::getCurPage($displacement);
    }
}