<?php
/*
* Added by Tab 21/11/2016
*/

$installer = $this;
$installer->startSetup();

$installer->getConnection()->addColumn($installer->getTable('affiliateplus/account'), 'bank_name', 'varchar(255) default ""');
$installer->getConnection()->addColumn($installer->getTable('affiliateplus/account'), 'bank_account_name', 'varchar(255) default ""');
$installer->getConnection()->addColumn($installer->getTable('affiliateplus/account'), 'bank_account_number', 'varchar(255) default ""');
$installer->getConnection()->addColumn($installer->getTable('affiliateplus/account'), 'bank_routing_code', 'varchar(255) default ""');
$installer->getConnection()->addColumn($installer->getTable('affiliateplus/account'), 'bank_swift_code', 'varchar(255) default ""');
$installer->getConnection()->addColumn($installer->getTable('affiliateplus/account'), 'bank_address', 'varchar(255) default ""');
$installer->getConnection()->addColumn($installer->getTable('affiliateplus/account'), 'bank_statement', 'varchar(255) default ""');

$installer->endSetup();