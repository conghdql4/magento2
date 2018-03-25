<?php

namespace CongHD\Uploadfile\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\DB\Adapter\AdapterInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        if (version_compare($context->getVersion(), '1.0.0') < 0){

		$installer->run('
                            CREATE TABLE file_status (
                              file_id int(11) NOT NULL,
                              file_name varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                              file_status int(11) DEFAULT NULL,
                              file_size int(11) DEFAULT NULL,
                              user_name varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                              store_name varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                              ip_address varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                              browser varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
                              date_uploaded timestamp NULL DEFAULT NULL,
                              date_updated timestamp NULL DEFAULT NULL)
                                ');


		//demo 
//$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
//$scopeConfig = $objectManager->create('Magento\Framework\App\Config\ScopeConfigInterface');
//demo 

		}

        $installer->endSetup();

    }
}