<?php

namespace Ecommage\ThanhEx2\Cron;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\DB\LoggerInterface;

class CronFile
{
    protected  $logger;
    protected $scopeConfig;

    public function __construct(\Psr\Log\LoggerInterface $logger, ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
        $this->logger = $logger;
    }

    public function execute()
    {
        return $this->logger->debug('abc'.$this->scopeConfig->getValue('cronjob/cron/cron_shedule'));
    }
//    protected $scopeConfig;
//
//    public function __construct(
//        ScopeConfigInterface $scopeConfig
//    ) {
//        $this->scopeConfig = $scopeConfig;
//    }
//
//    public function execute()
//    {
//
//      // echo $configValue = $this->scopeConfig->getValue('cronjob/cron/cron_shedule');
//        // do something with $configValue
//    }
}
