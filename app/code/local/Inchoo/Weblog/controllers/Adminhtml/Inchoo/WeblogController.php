<?php

/**
 * Class Inchoo_Weblog_Adminhtml_Inchoo_WeblogController
 *
 * Adminhtml controller
 */
class Inchoo_Weblog_Adminhtml_Inchoo_WeblogController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout()->_setActiveMenu('inchoo_weblog');

        /** _addContent is not called here because _addLeft includes main content through tabs */
        //$this->_addContent($this->getLayout()->createBlock('inchoo_weblog/adminhtml_list'));

        $this->_addLeft($this->getLayout()->createBlock('inchoo_weblog/adminhtml_tabs'));
        $this->renderLayout();
    }

    public function newAction()
    {
        $this->loadLayout()->_setActiveMenu('inchoo_weblog');

        $this->_addContent($this->getLayout()->createBlock('inchoo_weblog/adminhtml_new'));
        /**
         * TODO: How to set default tab from here??
         */
        //$this->_addLeft($this->getLayout()->createBlock('inchoo_weblog/adminhtml_tabs'));
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

    public function gridAction()
    {
        $this->getResponse()->setBody($this->getLayout()->createBlock(
                'inchoo_weblog/adminhtml_list_grid')->toHtml()
        );
    }
}