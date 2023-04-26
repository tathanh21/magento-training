<?php


namespace Ecommage\ThanhEx2\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class AddData implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup

    )
    {

        $this->moduleDataSetup = $moduleDataSetup;

    }

    public static function getDependencies()
    {
        return [];
    }

    public function apply()
    {
        $this->moduleDataSetup->startSetup();
        $setup = $this->moduleDataSetup;

        $data[] = ['title' => 'title 1', 'url_key' => 'google.com.vn', 'content' => 'content 1', 'status' => '1'];
        $data[] = ['title' => 'title 2', 'url_key' => 'facebook.com.vn', 'content' => 'content 2', 'status' => '2'];
        $data[] = ['title' => 'title 3', 'url_key' => 'zing.com.vn', 'content' => 'content 3', 'status' => '3'];

        $this->moduleDataSetup->getConnection()->insertArray(
            $this->moduleDataSetup->getTable('thanhex2'),
            ['title', 'url_key', 'content', 'status'],
            $data
        );
        $this->moduleDataSetup->endSetup();
    }

    public function getAliases()
    {
        return [];
    }
}
