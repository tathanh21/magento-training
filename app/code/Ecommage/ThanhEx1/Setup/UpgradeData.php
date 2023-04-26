<?php



namespace Ecommage\ThanhEx1\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;


class UpgradeData implements UpgradeDataInterface
{
    protected $state;
    protected $blockFactory;
    protected $widgetFactory;

    public function __construct(
        \Magento\Cms\Model\BlockFactory              $blockFactory,
        \Magento\Widget\Model\Widget\InstanceFactory $widgetFactory,
        \Magento\Framework\App\State                 $state
    ) {
        $this->blockFactory = $blockFactory;
        $this->widgetFactory = $widgetFactory;
        $state->setAreaCode(\Magento\Framework\App\Area::AREA_GLOBAL);
    }

    /**
     * Upgrade data for the module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     * @throws \Exception
     */

    public function upgrade(\Magento\Framework\Setup\ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        if (version_compare($context->getVersion(), '1.1.1') < 0) {
            $iden =  'testBlock';
            $cmsBlock = $this->blockFactory->create()->load($iden,'identifier');
            $widgetData = [
                'instance_type' => 'Magento\Cms\Block\Widget\Block',
                'instance_code' => 'cms_static_block',
                'theme_id' => 5,
                'title' => 'Test Widget 21',
                'store_ids' => '0',
                'widget_parameters' => '{"block_id":"' . $cmsBlock->getId() . '"}',

                'sort_order' => 0,
                'page_groups' => [[
                    'page_id' => 1,
                    'page_group' => 'all_pages',
                    'layout_handle' => 'default',
                    'for' => 'all',
                    'all_pages' => [
                        'page_id' => null,
                        'layout_handle' => 'default',
                        'block' => 'sidebar.additional',
                        'for' => 'all',
                        'template' => 'widget/static_block/default.phtml'
                    ]
                ]]
            ];

            $this->widgetFactory->create()->setData($widgetData)->save();
        }
        $setup->endSetup();
    }


}
