<?php

class Inchoo_Weblog_Block_Adminhtml_Weblog_Postlist extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'inchoo_weblog';
        $this->_controller = 'adminhtml_weblog_posts';
        $this->_headerText = Mage::helper('inchoo_weblog')->__('Posts - Weblog');
        parent::__construct();
        $this->_removeButton('add');
    }
}