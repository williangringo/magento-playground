<?php

class Inchoo_Weblog_PostsController extends Mage_Core_Controller_Front_Action
{
    /**
     * Default, view all entries action
     */
    public function indexAction()
    {
        $params = $this->getRequest()->getParams();
        $blogpost = Mage::getModel('weblog/blogpost');
        $blogpost->load($params['id']);
        $data = $blogpost->getData();

        var_dump( $data );
    }
}