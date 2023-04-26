<?php

namespace Ecommage\ThanhEx2\Controller\Order;

use Zend\Log\Filter\Timestamp;
use Magento\Store\Model\StoreManagerInterface;

class Post extends \Magento\Framework\App\Action\Action
{
    const XML_PATH_EMAIL_RECIPIENT_NAME = 'trans_email/ident_support/name';
    const XML_PATH_EMAIL_RECIPIENT_EMAIL = 'trans_email/ident_support/email';

    protected $_inlineTranslation;
    protected $_transportBuilder;
    protected $_scopeConfig;
    protected $_logLoggerInterface;
    protected $storeManager;

    public function __construct(
        \Magento\Framework\App\Action\Context              $context,
        \Magento\Framework\Translate\Inline\StateInterface $inlineTranslation,
        \Magento\Framework\Mail\Template\TransportBuilder  $transportBuilder,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Psr\Log\LoggerInterface                           $loggerInterface,
        StoreManagerInterface                              $storeManager,
        array                                              $data = []

    )
    {
        $this->_inlineTranslation = $inlineTranslation;
        $this->_transportBuilder = $transportBuilder;
        $this->_scopeConfig = $scopeConfig;
        $this->_logLoggerInterface = $loggerInterface;
        $this->messageManager = $context->getMessageManager();
        $this->storeManager = $storeManager;

        parent::__construct($context);
    }

    public function execute()
    {
        $post = $this->getRequest()->getParams();


        // Get form data in $post veriable

        try {
            // Send Mail
            $this->_inlineTranslation->suspend();

            // Email sender Name and Email address
            $sender = [
                'name' => $post['name'],
                'email' => $post['email']
            ];

           // $sentToEmail = $this->_scopeConfig->getValue('trans_email/ident_general/email', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

            //$sentToName = $this->_scopeConfig->getValue('trans_email/ident_general/name', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);


            // customemail_email_template  is a template id define in email_templates.xml file

            $transport = $this->_transportBuilder
                ->setTemplateIdentifier('customemail_email_template')
                ->setTemplateOptions(
                    [
                        'area' => 'frontend',
                        'store' => $this->storeManager->getStore()->getId()
                    ]
                )
                ->setTemplateVars($sender)
                    ->setFromByScope($sender)
                ->addTo('tatthanhk50pt@gmail.com', 'thanh')
                //->addTo('info@example.com','info')
                ->getTransport();

            $transport->sendMessage();

            $this->_inlineTranslation->resume();
            $this->messageManager->addSuccess('Email sent successfully');
            $this->_redirect('/customemail');

        } catch (\Exception $e) {
            $this->messageManager->addError($e->getMessage());
            $this->_logLoggerInterface->debug($e->getMessage());
            exit;
        }

    }
}


//namespace Ecommage\ThanhEx2\Controller\Order;
//
//use Magento\Framework\App\Action\Action;
//use Magento\Framework\App\Action\Context;
//use Magento\Framework\Controller\ResultFactory;
//use Magento\Framework\Exception\MailException;
//use Magento\Framework\Mail\Template\TransportBuilder;
//use Magento\Store\Model\StoreManagerInterface;
//
//
//class Post extends Action
//{
//    /**
//     * @var TransportBuilder
//     */
//    protected $_transportBuilder;
//    protected $storeManager;
//    /**
//     * @param Context $context
//     * @param TransportBuilder $transportBuilder
//     */
//    public function __construct(
//        Context          $context,
//        TransportBuilder $transportBuilder,
//        StoreManagerInterface $storeManager
//    )
//    {
//        parent::__construct($context);
//        $this->_transportBuilder = $transportBuilder;
//        $this->storeManager = $storeManager;
//    }
//
//    /**
//     * @inheritdoc
//     */
//    public function execute()
//    {
//        $post = $this->getRequest()->getParams();
////        echo '<pre>';
////        var_dump($post);
////        die();
//
//        if (!$post) {
//            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
//            $resultRedirect->setUrl($this->_redirect->getRefererUrl());
//            return $resultRedirect;
//        }
//
//        $title = isset($post['title']) ? $post['title'] : '';
//        $email = isset($post['email']) ? $post['email'] : '';
//        $content = isset($post['content']) ? $post['content'] : '';
//
//        $templateVars = [
//            'title' => $title,
//            'content' => $content,
//            'email' => $email,
//        ];
//
//        $storeId = $this->storeManager->getStore()->getId();
//
//        $templateOptions = [
//            'area' => \Magento\Framework\App\Area::AREA_FRONTEND,
//            'store' => $storeId
//        ];
//
//        $from = ['email' => 'tatthanhk50pt@gmail.com', 'name' => 'thanh'];
//
//        $to = ['email' => 'tatthanhk50pt@gmail.com'];
//        var_dump($to);
//        die();
//
//        $transport = $this->_transportBuilder->setTemplateIdentifier('customemail_email_template')
//            ->setTemplateOptions($templateOptions)
//            ->setTemplateVars($templateVars)
//            ->setFrom($from)
//            ->addTo($to)
//            ->getTransport();
////        var_dump('asd');
////        die();
//
//        try {
//            $transport->sendMessage();
//            $this->messageManager->addSuccess(__('Your message has been sent.'));
//        } catch (MailException $e) {
//            $this->messageManager->addError(__('There was a problem sending your email: %1', $e->getMessage()));
//        }
//
//        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
//        $resultRedirect->setUrl($this->_redirect->getRefererUrl());
//        return $resultRedirect;
//    }
//}
