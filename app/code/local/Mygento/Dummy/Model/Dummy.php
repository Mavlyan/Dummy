<?php

/**In order to use this entity - uncomment related lines in config.xml and setupo the module again
 *
 *
 * @category Mygento
 * @package Mygento_Dummy
 * @copyright 2017 NKS LLC. (http://www.mygento.ru)
 */
class Mygento_Dummy_Model_Dummy extends Mage_Core_Model_Abstract
{

    protected function _construct()
    {
        $this->_init('dummy/dummy');
    }

    /** To run it by CRON
     *
     */
    public function ololoMethod()
    {
    }
}
