<?php

class Inchoo_Weblog_Block_Adminhtml_List extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'inchoo_weblog';
        $this->_controller = 'adminhtml_list';
        $this->_headerText = Mage::helper('inchoo_weblog')->__('List blog posts');

        parent::__construct();
    }
}