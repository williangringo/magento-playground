<?php

class Inchoo_Weblog_Block_Adminhtml_New extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();

        $this->_objectId = 'id';
        $this->_blockGroup = 'inchoo_weblog';
        $this->_controller = 'adminhtml'; // WTF?
        $this->_mode = 'new';

        //$this->_updateButton('save', 'label', Mage::helper('inchoo_weblog')->__('Save post'));
       // $this->_updateButton('delete', 'label', Mage::helper('inchoo_weblog')->__('Delete post'));
    }

    public function getHeaderText()
    {
        return Mage::helper('inchoo_weblog')->__('Add new post');
    }
}