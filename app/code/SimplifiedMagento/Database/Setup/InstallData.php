<?php


namespace SimplifiedMagento\Database\Setup;


use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{

    /**
     * Installs data for a module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $setup->getConnection()->insert(
            $setup->getTable('affiliate_member'),
            ['name'=>'Prabhat','address' => 'No-123, Rourkela', 'status' => true]
        );

        $setup->getConnection()->insert(
            $setup->getTable('affiliate_member'),
            ['name'=>'Sonu','address' => 'No-123, Bhubaneswar']
        );

        $setup->endSetup();

    }
}