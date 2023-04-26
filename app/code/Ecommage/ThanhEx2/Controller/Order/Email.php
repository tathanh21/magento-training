<?php
namespace Ecommage\ThanhEx2\Controller\Order;

class Email extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $email = $this->getRequest()->getParam('email');
        $id = intval($this->getRequest()->getParam('id'));
        $order = $this->_objectManager->create('Magento\Sales\Model\Order')->load($id); // this is entity id
        $order->setCustomerEmail($email);
        if ($order) {
            try {
                $this->_objectManager->create('\Magento\Sales\Model\OrderNotifier')->notify($order);
                echo 'You sent the order email.';
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                echo($e->getMessage());
            } catch (\Exception $e) {
                echo(__('We can\'t send the email order right now.'));
                echo($e->getMessage());
            }
        }
    }
}
