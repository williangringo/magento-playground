<?php

class Inchoo_Weblog_Helper_Data extends Mage_Core_Helper_Data
{
    const XML_PATH_ENABLE_COMMENTS = 'inchoo_weblog/settings/enable_comments';

    public function getCommentsState($store = null)
    {
        return Mage::getStoreConfig(self::XML_PATH_ENABLE_COMMENTS, $store);
    }
}