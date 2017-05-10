<?php 

/**
 *
 *
 * @category Mygento
 * @package Mygento_Dummy
 * @copyright 2017 NKS LLC. (http://www.mygento.ru)
 */
$this->startSetup();
/* If you want to create new table for new entity: */
//$table = $this->getTable('dummy/dummy');
//
//$this->run(
//    "
//DROP TABLE IF EXISTS {$table};
//CREATE TABLE `{$table}` (
//  `id` bigint(20) NOT NULL AUTO_INCREMENT,
//  `number` varchar(255) NOT NULL,
//  PRIMARY KEY (`id`),
//  UNIQUE KEY (`number`)
//) ENGINE=InnoDB DEFAULT CHARSET=utf8;
//");


/* In you want to change ORDER table: */
//$installer = new Mage_Sales_Model_Resource_Setup('core_setup');
//$installer->getConnection()->addColumn(
//        $installer->getTable('sales/order'), 'spartak_transaction_id', 'varchar(255)'
//);
//$installer->getConnection()
//        ->addKey(
//                $installer->getTable('sales/order'),
//                'TRANSACTION_ID_IDX',
//                'spartak_transaction_id',
//                'UNIQUE'
//);

$this->endSetup();