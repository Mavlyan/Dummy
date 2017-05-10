<?php

/**
 *
 *
 * @category Mygento
 * @package Mygento_Dummy
 * @copyright 2017 NKS LLC. (http://www.mygento.ru)
 */
class Mygento_Dummy_Adminhtml_Dummy_IndexController extends Mage_Adminhtml_Controller_Action
{
    protected $_code = 'dummy';

    /** Default action. URL: https://example.ru/index.php/admin/dummy_index
     *
     * void
     */
    public function indexAction()
    {
        $helper = Mage::helper($this->_code);

        $this->_redirectReferer();
    }
}
