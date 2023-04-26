<?php
namespace Ecommage\ThanhEx2\Controller\Customer\CustomerSaveEdit;

/**
 * Interceptor class for @see \Ecommage\ThanhEx2\Controller\Customer\CustomerSaveEdit
 */
class Interceptor extends \Ecommage\ThanhEx2\Controller\Customer\CustomerSaveEdit implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory, \Magento\Customer\Model\Session $customerSession, \Magento\Framework\App\Action\Context $context, \Ecommage\ThanhEx2\Model\PostFactory $postFactory)
    {
        $this->___init();
        parent::__construct($resultJsonFactory, $customerSession, $context, $postFactory);
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
