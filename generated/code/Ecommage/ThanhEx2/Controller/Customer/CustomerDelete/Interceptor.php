<?php
namespace Ecommage\ThanhEx2\Controller\Customer\CustomerDelete;

/**
 * Interceptor class for @see \Ecommage\ThanhEx2\Controller\Customer\CustomerDelete
 */
class Interceptor extends \Ecommage\ThanhEx2\Controller\Customer\CustomerDelete implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Customer\Model\Session $customerSession, \Magento\Framework\App\Action\Context $context, \Ecommage\ThanhEx2\Model\PostFactory $postFactory)
    {
        $this->___init();
        parent::__construct($customerSession, $context, $postFactory);
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
