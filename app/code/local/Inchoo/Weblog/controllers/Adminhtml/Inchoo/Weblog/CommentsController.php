<?php

class Inchoo_Weblog_Adminhtml_Inchoo_Weblog_CommentsController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_title($this->__('Weblog'))->_title($this->__('Comments'));
        $this->loadLayout();
        $this->_setActiveMenu('inchoo_weblog/comments');
        $this->renderLayout();
    }
}