<?php


namespace SimplifiedMagento\VipDatabaseSchema\Setup;


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
            $setup->getTable('vip_member'),
            ['name'=>'Prabhat','address' => 'No-123, Rourkela', 'status' => true,'phone_number' => '9438471200']
        );

        $setup->getConnection()->insert(
            $setup->getTable('vip_member'),
            ['name'=>'Sonu','address' => 'No-123, Bhubaneswar','phone_number' => '7809271584']
        );

        $setup->getConnection()->insert(
            $setup->getTable('vip_member'),
            ['name'=>'Vijay','address' => 'No-123, chakrapr','phone_number' => '8076537488']
        );

        $setup->endSetup();

    }
}