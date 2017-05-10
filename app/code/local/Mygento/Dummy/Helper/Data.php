<?php

/**
 *
 *
 * @category Mygento
 * @package Mygento_Dummy
 * @copyright 2017 NKS LLC. (http://www.mygento.ru)
 */
class Mygento_Dummy_Helper_Data extends Mage_Core_Helper_Abstract
{
    protected $_code = 'dummy';

    public function addLog($message, $isCritical = false)
    {
        $filename = $this->_code . '.log';
        $filenameCritical = $this->_code . '_critical.log';
        if ($this->getConfig('debug')) {
            Mage::log($message, null, $filename, true);
        }

        if ($isCritical) {
            Mage::log($message, Zend_Log::CRIT, $filenameCritical, true);
        }
    }

    /** Show Warning Notification in Dashboard
     *
     */
    public function showNotification($title, $description = '')
    {
        $notification = Mage::getModel('adminnotification/inbox');

        $notification->setDateAdded(date('Y-m-d H:i:s'));
        $notification->setSeverity(Mage_AdminNotification_Model_Inbox::SEVERITY_MAJOR);
        $notification->setTitle($title);
        $notification->setDescription($description);

        $notification->save();
    }

    public function getCurrentQuote()
    {
        if (Mage::app()->getStore()->isAdmin()) {
            return Mage::getSingleton('adminhtml/session_quote')->getQuote();
        }

        return Mage::getSingleton('checkout/session')->getQuote();
    }

    /**
     * Retrieve information from configuration
     *
     * @param   string $field
     * @return  mixed
     */
    public function getConfig($field, $group = '', $store = null)
    {
        if (empty($this->_code)) {
            return false;
        }

        $config = Mage::getStoreConfig($this->_code, $store);

        if ($group === '') {
            foreach ($config as $value) {
                if (array_key_exists($field, $value)) {
                    return $value[$field];
                }
            }
        }

        return isset($config[$group][$field]) ? $config[$group][$field] : Mage::getStoreConfig($this->_code . '/' . $group . '/' . $field, $store);
    }
}
