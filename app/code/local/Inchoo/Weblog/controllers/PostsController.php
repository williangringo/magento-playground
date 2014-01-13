<?php

/**
 * Class Inchoo_Weblog_PostsController
 *
 * Frontend class
 */
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
        /** Fetch Id from request, blogpost and comments from db */
        $id = $this->getRequest()->getPAram('id');
        $blogpost = Mage::getModel('weblog/blogpost');
        $blogpost->load($id);
        $comments = Mage::getModel('weblog/blogcomments')->getCollection()
            ->addFieldToFilter('post_id_fk', array('eq', $id));

        /** 404 if post can't be loaded */
        if ($blogpost->getId() == null) {
            $this->_forward('noRoute');
            return;
        }

        /** Store in register for layout */
        Mage::register('blog_post', $blogpost);
        Mage::register('blog_comments', $comments);

        $this->loadLayout();
        $this->renderLayout();
    }

    /**
     * Add new comment
     */
    public function commentAction()
    {
        /** get user data */
        $commentText = $this->getRequest()->getParam('comment');
        $postId = $this->getRequest()->getParam('id');

        /** update db */
        if ($commentText != '') {
            $comment = Mage::getModel('weblog/blogcomments');
            $comment->setComment($commentText);
            $comment->setPostIdFk($postId);
            $comment->save();
        }

        /** redirect to post */
        $this->_redirect('*/*/view', array('id' => $postId));
    }
}