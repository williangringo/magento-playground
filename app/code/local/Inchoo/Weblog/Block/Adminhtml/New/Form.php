<?php

class Inchoo_Weblog_Block_Adminhtml_New_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm() {
        $form = new Varien_Data_Form(array(
            'id' => 'new_form',
            'action' => $this->getUrl('*/*/*'),
            'method' => 'post',
            'enctype' => 'multipart/form-data'
        ));

        $form->setUseContainer(true);
        $this->setForm($form);

        $fieldset = $form->addFieldset('weblog_form', array(
            'legend' => Mage::helper('inchoo_weblog')->__('New post information')
        ));

        $fieldset->addField('title', 'text', array(
            'label' => Mage::helper('inchoo_weblog')->__('Post title'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'title'
        ));

        $fieldset->addField('content', 'textarea', array(
            'label' => Mage::helper('inchoo_weblog')->__('Post content'),
            'class' => 'required-entry',
            'required' => true,
            'name' => 'content'
        ));

        return parent::_prepareForm();
    }
}