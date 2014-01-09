<?php

class Inchoo_Weblog_Adminhtml_Inchoo_Weblog_PostsController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->_setActiveMenu('system/inchoo_weblog_posts');
        $this->renderLayout();
    }

    /**
     * Check currently called action by permissions for current user
     *
     * @return bool
     */
    protected function _isAllowed() {
        return Mage::getModel('admin/session')->isAllowed('inchoo_weblog_post');
    }

}