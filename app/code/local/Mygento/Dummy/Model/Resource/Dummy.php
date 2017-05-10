<?php

/**
 *
 *
 * @category Mygento
 * @package Mygento_Dummy
 * @copyright 2017 NKS LLC. (http://www.mygento.ru)
 */
class Mygento_Dummy_Model_Resource_Dummy extends Mage_Core_Model_Resource_Db_Abstract
{

    protected function _construct()
    {
        $this->_init('dummy/dummy', 'id');
    }

}
