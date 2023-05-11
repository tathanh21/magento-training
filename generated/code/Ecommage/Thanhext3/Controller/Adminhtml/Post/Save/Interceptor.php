<?php
namespace Ecommage\Thanhext3\Controller\Adminhtml\Post\Save;

/**
 * Interceptor class for @see \Ecommage\Thanhext3\Controller\Adminhtml\Post\Save
 */
class Interceptor extends \Ecommage\Thanhext3\Controller\Adminhtml\Post\Save implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Ecommage\ThanhEx2\Controller\Adminhtml\Post\PostDataProcessor $dataProcessor, \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor, ?\Ecommage\Thanhext3\Model\PostFactory $postFactory = null, ?\Magento\Cms\Api\PageRepositoryInterface $pageRepository = null)
    {
        $this->___init();
        parent::__construct($context, $dataProcessor, $dataPersistor, $postFactory, $pageRepository);
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'execute');
        return $pluginInfo ? $this->___callPlugins('execute', func_get_args(), $pluginInfo) : parent::execute();
    }

    /**
     * {@inheritdoc}
     */
    public function dispatch(\Magento\Framework\App\RequestInterface $request)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'dispatch');
        return $pluginInfo ? $this->___callPlugins('dispatch', func_get_args(), $pluginInfo) : parent::dispatch($request);
    }
}
