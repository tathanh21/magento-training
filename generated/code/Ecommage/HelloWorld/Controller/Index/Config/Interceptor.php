<?php
namespace Ecommage\HelloWorld\Controller\Index\Config;

/**
 * Interceptor class for @see \Ecommage\HelloWorld\Controller\Index\Config
 */
class Interceptor extends \Ecommage\HelloWorld\Controller\Index\Config implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Ecommage\HelloWorld\Helper\Data $helperData, \Magento\Framework\Controller\Result\ForwardFactory $forwardFactory, \Magento\Framework\Controller\Result\RedirectFactory $resultRedirectFactory)
    {
        $this->___init();
        parent::__construct($context, $helperData, $forwardFactory, $resultRedirectFactory);
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
