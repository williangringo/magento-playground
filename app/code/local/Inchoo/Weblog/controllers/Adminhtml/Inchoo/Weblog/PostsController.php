<?php

class Inchoo_Weblog_Adminhtml_Inchoo_Weblog_PostsController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_title($this->__('Weblog'))->_title($this->__('Posts'));
        $this->loadLayout();
        $this->_setActiveMenu('inchoo_weblog/posts');
        $block = $this->getLayout()->createBlock('inchoo_weblog/adminhtml_weblog_postlist');
        var_dump($block);
        $this->_addContent($block);
        $this->renderLayout();
    }

    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('inchoo_weblog/adminhtml_weblog_posts_grid')->toHtml()
        );
    }
}