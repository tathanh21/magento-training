<?php
namespace Ecommage\ThanhEx2\Controller\Adminhtml\Post\EditStatus3;

/**
 * Interceptor class for @see \Ecommage\ThanhEx2\Controller\Adminhtml\Post\EditStatus3
 */
class Interceptor extends \Ecommage\ThanhEx2\Controller\Adminhtml\Post\EditStatus3 implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Ui\Component\MassAction\Filter $filter, \Ecommage\ThanhEx2\Model\PostFactory $postFactory)
    {
        $this->___init();
        parent::__construct($context, $filter, $postFactory);
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
