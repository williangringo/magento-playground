<?php

class Inchoo_Weblog_Block_Adminhtml_List_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();

        $this->setId('weblog_weblog');
        $this->setDefaultsort('blogpost_id');
        $this->setUseAjax(true);

        /**
         * Disable state storage in session
         *
         * When cycling through tabs, state of each tab is stored in session.
         * Can be disabled for development purposes
         */
        //$this->setSaveParametersInSession(false);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('weblog/blogpost')->getCollection();
        $collection->getSelect();
        // FIX: not showing posts withou comments
//            ->join(array('a' => 'blog_comments'), 'main_table.blogpost_id = a.post_id_fk', array(
//                'comments'       => 'blogcomment_id'
//            ))
//            ->group('main_table.blogpost_id');

        $this->setCollection($collection);
        parent::_prepareCollection();
        return $this;
    }

    protected function _prepareColumns()
    {
        $this->addColumn('blogpost_id', array(
            'header' => Mage::helper('inchoo_weblog')->__('Post #'),
            'width' => '50px',
            'filter'   => false, /** Disable filter input box on field */
            'index' => 'blogpost_id',
        ));
        $this->addColumn('timestamp', array(
            'header' => Mage::helper('inchoo_weblog')->__('Date'),
            'width' => '200px',
            'index' => 'timestamp',
        ));
//        $this->addColumn('comments', array(
//            'header' => Mage::helper('inchoo_weblog')->__('# Comments'),
//            'width' => '50px',
//            'filter'   => false,
//            'index' => 'comments'
//        ));
        $this->addColumn('title', array(
            'header' => Mage::helper('inchoo_weblog')->__('Title'),
            'type' => 'text',
            'index' => 'title'
        ));

        $this->addColumn('edit', array(
            'header'   => Mage::helper('inchoo_weblog')->__('Edit'),
            'width'    => 15,
            'sortable' => false, /** Disable sorting by this column */
            'filter'   => false,
            'type'     => 'action',
            'getter'     => 'getId', /** (auto)Defined in collection */
            'actions'  => array(
                array(
                    'url'     => array('base'=>'*/*/edit'),
                    'caption' => Mage::helper('inchoo_weblog')->__('Edit'),
                    'field'   => 'id'
                )
            )
        ));
        $this->addColumn('delete', array(
            'header'   => Mage::helper('inchoo_weblog')->__('Delete'),
            'width'    => 15,
            'sortable' => false,
            'filter'   => false,
            'type'     => 'action',
            'getter'     => 'getId',
            'actions'  => array(
                array(
                    'url'     => array('base'=>'*/*/delete'),
                    'caption' => Mage::helper('inchoo_weblog')->__('Delete'),
                    'field'   => 'id'
                ),
            )
        ));

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return Mage::helper("adminhtml")->getUrl("*/*/edit", array('id' => $row->getId()));
    }

    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid');
    }

}