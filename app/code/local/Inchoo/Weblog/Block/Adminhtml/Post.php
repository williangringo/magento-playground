<?php

class Inchoo_Weblog_Block_Adminhtml_Post extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();

        $this->_objectId = 'id';
        /**
         * End block is generated from folder:
         * _blockGroup + _controller + _mode
         */
        $this->_blockGroup = 'inchoo_weblog';
        $this->_controller = 'adminhtml';
        $this->_mode = 'edit';

        /** Override button label */
        $this->_updateButton('save', 'label', Mage::helper('inchoo_weblog')->__('Save post'));
        /** Remove unused label */
        $this->removeButton('reset');
    }

    public function getHeaderText()
    {
        return Mage::helper('inchoo_weblog')->__('Add new post');
    }
}