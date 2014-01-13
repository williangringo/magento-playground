<?php

class Inchoo_Weblog_Block_Adminhtml_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm() {
        $form = new Varien_Data_Form(array(
            'id' => 'edit_form',
            'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
            'method' => 'post',
            'enctype' => 'multipart/form-data'
        ));

        $form->setUseContainer(true);
        $this->setForm($form);

        /**
         * Store data while in admin session
         * see: setSaveParametersInSession()
         */
        if (Mage::getSingleton('adminhtml/session')->getFormData()) {
            $data = Mage::getSingleton('adminhtml/session')->getFormData();
            Mage::getSingleton('adminhtml/session')->setFormData(null);
        } else if (Mage::registry('blogpost_data')) {
            $data = Mage::registry('blogpost_data')->getData();
        }

        $fieldset = $form->addFieldset('weblog_form', array(
            'legend' => Mage::helper('inchoo_weblog')->__('New post information')
        ));

        $fieldset->addField('title', 'text', array(
            'label' => Mage::helper('inchoo_weblog')->__('Post title'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'title'
        ));

        $fieldset->addField('post', 'textarea', array(
            'label' => Mage::helper('inchoo_weblog')->__('Post content'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'post'
        ));

        $form->setValues($data);
        return parent::_prepareForm();
    }
}