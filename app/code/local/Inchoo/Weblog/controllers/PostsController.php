<?php

class Inchoo_Weblog_PostsController extends Mage_Core_Controller_Front_Action
{
    /**
     * Default, view all entries action
     */
    public function indexAction()
    {
        /**
         * Fetch data from model, store it to register for layout
         */
        $blog = Mage::getModel('weblog/blogpost')->getCollection();
        Mage::register('blog_posts', $blog);

        $this->loadLayout();
        $this->renderLayout();
    }

    /**
     * Single post view
     */
    public function viewAction()
    {
        /**
         * Fetch Id from request, blogpost from db
         */
        $id = $this->getRequest()->getPAram('id');
        $blogpost = Mage::getModel('weblog/blogpost');
        $blogpost->load($id);

        /**
         * 404 if post can't be loaded
         */
        if ($blogpost->getId() == null) {
            $this->_forward('noRoute');
            return;
        }

        /**
         * Store in register for layout
         */
        Mage::register('blog_post', $blogpost);

        $this->loadLayout();
        $this->renderLayout();
    }
}