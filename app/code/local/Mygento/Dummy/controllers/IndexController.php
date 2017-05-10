<?php

/**
 *
 *
 * @category Mygento
 * @package Mygento_Dummy
 * @copyright 2017 NKS LLC. (http://www.mygento.ru)
 */
require_once Mage::getModuleDir('', 'Mage_Core') . DS . 'Controller' . DS . 'Front' . DS . 'Action.php';

class Mygento_Dummy_IndexController extends Mage_Core_Controller_Front_Action
{

    /** Default action. URL to invoke it: http://mageshop.com/dummy/index/index or http://mageshop.com/dummy
     *
     */
    public function indexAction()
    {
        //It loads Magento layout
        $this->loadLayout();

        //It renders layout: process all related layout/*.xml and templates and show html
        $this->renderLayout();
    }

}
