<?php
namespace Ecommage\ThanhEx2\Controller\Order;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Mail\Template\TransportBuilder;
use Magento\Framework\Translate\Inline\StateInterface;

class Sendemail extends Action
{
    protected $transportBuilder;
    protected $inlineTranslation;

    public function __construct(
        Context $context,
        TransportBuilder $transportBuilder,
        StateInterface $inlineTranslation
    ) {
        parent::__construct($context);
        $this->transportBuilder = $transportBuilder;
        $this->inlineTranslation = $inlineTranslation;
    }

    public function execute()
    {
        $email = 'tatthanhk50pt@gmail.com';

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo 'Địa chỉ email không hợp lệ';
            die();
        }

        // Lấy thông tin email cần gửi
        $senderName = "Thành";
        $senderEmail = "tatthanhk50pt@gmail.com";
        $recipientEmail = "tatthanhk50pt@gmail.com";
        $recipientName = "Người";
        $subject = "Tiêu đề email";
        $content = "Nội dung email";

        // Tạo transport email
        $transport = $this->transportBuilder
            ->setTemplateIdentifier('customemail_email_template')
            ->setTemplateOptions(['area' => \Magento\Framework\App\Area::AREA_FRONTEND, 'store' => \Magento\Store\Model\Store::DEFAULT_STORE_ID])
            ->setTemplateVars([
                'content' => $content
            ])
            ->setFrom([
                'email' => $senderEmail,
                'name' => $senderName
            ])
            ->addTo([
                $recipientEmail,
                $recipientName
            ])
            ->getTransport();

        // Gửi email
        $this->inlineTranslation->suspend();
        $transport->sendMessage();
        $this->inlineTranslation->resume();

        // Hiển thị thông báo gửi email thành công
        $this->messageManager->addSuccessMessage(__('Gửi email thành công.'));
        $this->_redirect('/');
    }
}
