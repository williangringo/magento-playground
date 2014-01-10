<?php

class Inchoo_Weblog_Block_Adminhtml_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('form_tabs');
        $this->setDestElementId('weblog_list');
        $this->setTitle(Mage::helper('inchoo_weblog')->__('List posts'));
    }

    protected function _beforeToHtml()
    {
        $this->addTab('list_section', array(
            'label' => Mage::helper('inchoo_weblog')->__('List posts'),
            'title' => Mage::helper('inchoo_weblog')->__('List posts'),
            //'content' => $this->getLayout()->createBlock('inchoo_weblog/adminhtml_list')->toHtml(),
        ));
        $this->addTab('new_section', array(
            'label' => Mage::helper('inchoo_weblog')->__('New post'),
            'title' => Mage::helper('inchoo_weblog')->__('New post'),
            //'content' => $this->getLayout()->createBlock('inchoo_weblog/adminhtml_new')->toHtml(),
        ));

        return parent::_beforeToHtml();
    }
}