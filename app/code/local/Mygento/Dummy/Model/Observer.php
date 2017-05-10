<?php

/**
 *
 *
 * @category Mygento
 * @package Mygento_Dummy
 * @copyright 2017 NKS LLC. (http://www.mygento.ru)
 */
class Mygento_Dummy_Model_Observer
{
    protected $_code = 'dummy';

    public function dummyMethod($observer)
    {
        $customer = $observer->getEvent()->getCustomer();
    }
}
