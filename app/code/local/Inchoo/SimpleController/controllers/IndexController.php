<?php

class Inchoo_SimpleController_IndexController extends Mage_Core_Controller_Front_Action
{
    /**
     * Default controller action
     *
     * Triggered when calling http://playground.loc/simple
     */
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }
}