<?php

class Inchoo_Weblog_Adminhtml_Inchoo_WeblogController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout()->_setActiveMenu('inchoo_weblog');
        $this->_addContent($this->getLayout()->createBlock('inchoo_weblog/adminhtml_list'));
        $this->renderLayout();
    }

    public function gridAction()
    {
        $this->getResponse()->setBody($this->getLayout()->createBlock(
            'inchoo_weblog/adminhtml_list_grid')->toHtml()
        );
    }

    public function newAction(){
        /**
         * TODO: write this function
         */
        $this->loadLayout()->_setActiveMenu('inchoo_weblog');
        $this->renderLayout();
    }

    public function editAction()
    {
        /**
         * TODO: Write this function
         */
        echo "admin edit";
        $this->loadLayout()->_setActiveMenu('inchoo_weblog');
        $this->renderLayout();
    }

    public function deleteAction()
    {
        /**
         * TODO: Write this function
         */
        echo "admin delete";
        $this->loadLayout()->_setActiveMenu('inchoo_weblog');
        $this->renderLayout();
    }
}