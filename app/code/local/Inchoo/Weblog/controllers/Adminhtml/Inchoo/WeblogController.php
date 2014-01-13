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
        /** forward request to edit action */
        $this->_forward('edit');
    }

    public function editAction()
    {
        $id = $this->getRequest()->getParam('id', null);
        $blogpost = Mage::getModel('weblog/blogpost');

        if ($id != false) {
            $blogpost->load((int) $id);
            if ($blogpost->getId() != false) {
                $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
                if ($data) {
                    $blogpost->setData($data)->setId($id);
                }
            } else {
                Mage::getSingleton('adminhtml/session')->addError(
                    Mage::helper('awesome')->__('The blog post registry does not exist'));
                $this->_redirect('*/*/');
            }
        }
        Mage::register('blogpost_data', $blogpost);

        $this->loadLayout()
            ->_setActiveMenu('inchoo_weblog')
            ->_addContent($this->getLayout()->createBlock('inchoo_weblog/adminhtml_post'))
            ->renderLayout();
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

    public function saveAction()
    {
        if ($this->getRequest()->getPost()) {
            try {
                $data = $this->getRequest()->getPost();
                $id = $this->getRequest()->getParam('id');

                if ($data) {
                    $blogpost = Mage::getModel('weblog/blogpost')->load($id);
                    $blogpost->setData($data);
                    if ($id) $blogpost->setId($id); /** perform update */
                    $blogpost->save();
                    if ($id) {
                        $this->_redirect('*/*/edit', array('id' => $blogpost->getId()));
                    } else {
                        $this->_redirect('*/*/index');
                    }
                }
            } catch (Exception $e) {
                $this->_getSession()->addError(
                    Mage::helper('inchoo_weblog')->__('An error occured while saving blog post data.')
                );
                Mage::logException($e);
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('blogpost_id')));
                return $this;
            }
        }
    }

    public function gridAction()
    {
        $this->getResponse()->setBody($this->getLayout()->createBlock(
                'inchoo_weblog/adminhtml_list_grid')->toHtml()
        );
    }
}