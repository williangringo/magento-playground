<?php

class Inchoo_Weblog_Block_Adminhtml_Weblog_Posts_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('inchoo_weblog_grid');
        $this->setDefaultsort('blogpost_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel('weblog/blogpost');
        $this->setCollection($collection);
        return $this;
    }

    protected function _prepareColumns()
    {
        $helper = Mage::helper('inchoo_weblog');
        $this->addColumn('blogpost_id', array(
            'header' => $helper->__('Post #'),
            'index' => 'blogpost_id'
        ));
        $this->addColumn('title', array(
            'header' => $helper->__('Title'),
            'index' => 'title'
        ));
        $this->addColumn('date', array(
            'header' => $helper->__('Created on'),
            'index' => 'date'
        ));

        return parent::_prepareColumns();
    }

    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current'=>true));
    }
}