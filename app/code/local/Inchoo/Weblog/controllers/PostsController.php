<?php

class Inchoo_Weblog_PostsController extends Mage_Core_Controller_Front_Action
{
    /**
     * Default, view all entries action
     */
    public function indexAction()
    {
        $posts = Mage::getModel('weblog/blogpost')->getcollection();

        foreach($posts as $post) {
            echo '<h3><a href="http://playground.loc/weblog/posts/view/id/', $post->getBlogpost_id(), '">', $post->getTitle(), '</a></h3>';
            echo '<h6>', $post->getDate(), '</h6>';
        }
    }

    /**
     * Single post view
     */
    public function viewAction()
    {
        /**
         * FIXME: How to check for empty result?
         */
         $id = $this->getRequest()->getParam('id');
         $blogpost = Mage::getModel('weblog/blogpost');
         $blogpost->load($id);

        echo '<h2>', $blogpost->getTitle(), '</h2>';
        echo '<h6>', $blogpost->getDate(), '</h6>';
        echo '<span><a href="http://playground.loc/weblog/posts/delete/id/', $blogpost->getBlogpost_id(), '">delete</a></span>';
        echo ' - ';
        echo '<span><a href="http://playground.loc/weblog/posts/edit/id/', $blogpost->getBlogpost_id(), '">edit</a></span>';
        echo '<p>', nl2br($blogpost->getPost()), '</p>';
    }

    public function deleteAction()
    {
        $id = $this->getRequest()->getParam('id');
        $post = Mage::getModel('weblog/blogpost');
        $post->load($id);
        $post->delete();

        /**
         * FIXME: Redirect ??
         */
    }
}