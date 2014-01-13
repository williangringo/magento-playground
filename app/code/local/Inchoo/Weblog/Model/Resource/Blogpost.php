<?php

class Inchoo_Weblog_Model_Resource_Blogpost extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        /**
         * First parameter identifies the model
         * Second parameter is identifier, usually primary key
         */
        $this->_init('weblog/blogpost', 'blogpost_id');
    }
}