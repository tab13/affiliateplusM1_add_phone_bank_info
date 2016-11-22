<?php
/*
* Added by Tab 21/11/2016
*/

$installer = $this;
$installer->startSetup();

$installer->getConnection()->addColumn($installer->getTable('affiliateplus/account'), 'telephone', 'varchar(255) default ""');

$installer->endSetup();