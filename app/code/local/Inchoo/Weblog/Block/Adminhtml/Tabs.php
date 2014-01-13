<?php

class Inchoo_Weblog_Block_Adminhtml_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    public function __construct()
    {
        parent::__construct();

        $this->setId('weblog_form_tabs');
        $this->setTitle(Mage::helper('inchoo_weblog')->__('Inchoo Weblog'));
    }

    protected function _beforeToHtml()
    {
        /** Last one with 'actvive' => true will be displayed by default */

        $this->addTab('weblog_list_section', array(
            'label' => Mage::helper('inchoo_weblog')->__('List posts'),
            'title' => Mage::helper('inchoo_weblog')->__('List all posts'),
            'content' => $this->getLayout()->createBlock('inchoo_weblog/adminhtml_list')->toHtml(),
            'active' => true,
        ));

//        $this->addTab('weblog_new_entry', array(
//            'label' => Mage::helper('inchoo_weblog')->__('Add new'),
//            'title' => Mage::helper('inchoo_weblog')->__('Add new blog entry'),
//            'content' => $this->getLayout()->createBlock('inchoo_weblog/adminhtml_new')->toHtml(),
//            'active' => false,
//        ));

        $this->addTab('weblog_sample_1', array(
            'label' => Mage::helper('inchoo_weblog')->__('Sample tab #1'),
            'title' => Mage::helper('inchoo_weblog')->__('Title for sample tab #1'),
            'content' => 'Sample tab 1',
            'active' => false,
        ));

        $this->addTab('weblog_sample_2', array(
            'label' => Mage::helper('inchoo_weblog')->__('Sample tab #2'),
            'title' => Mage::helper('inchoo_weblog')->__('Title for sample tab #2'),
            'content' => 'Text that is placed inside tab 2.',
            'active' => false,
        ));

        return parent::_beforeToHtml();
    }
}