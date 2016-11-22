<?php

class Magestore_Affiliateplus_Block_Adminhtml_Account_Edit_Tab_Bankaccountinfo extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        
        $data = array();
        if (Mage::getSingleton('adminhtml/session')->getAccountData()) {
            $data = Mage::getSingleton('adminhtml/session')->getAccountData();
            Mage::getSingleton('adminhtml/session')->setAccountData(null);
        } elseif (Mage::registry('account_data')) {
            $data = Mage::registry('account_data')->getData();
        }
        
        $storeId = $this->getRequest()->getParam('store');
        if ($storeId) {
            $store = Mage::getModel('core/store')->load($storeId);
        } else {
            $store = Mage::app()->getStore();
        }
        
        $bankAccount = Mage::getModel('affiliatepluspayment/bankaccount')
                        ->load($this->getRequest()->getParam('id'),'account_id');
        $data['name'] = $bankAccount->getName();
        $data['address'] = $bankAccount->getAddress();
        $data['account_name'] = $bankAccount->getAccountName();
        $data['account_number'] = $bankAccount->getAccountNumber();
        $data['routing_code'] = $bankAccount->getRoutingCode();
        $data['swift_code'] = $bankAccount->getSwiftCode();
        $data['statement'] = 'affiliateplus/bankstate/'. $bankAccount->getStatement();

        $fieldset = $form->addFieldset('bankaccountinfo_form', array('legend' => Mage::helper('affiliateplus')->__('Bank Account Information')));

        $fieldset->addField('name', 'label', array(
            'label' => Mage::helper('affiliateplus')->__('Bank Name')
        ));
        $fieldset->addField('address', 'label', array(
            'label' => Mage::helper('affiliateplus')->__('Bank Address')
        ));
        $fieldset->addField('account_name', 'label', array(
            'label' => Mage::helper('affiliateplus')->__('Account Name')
        ));
        $fieldset->addField('account_number', 'label', array(
            'label' => Mage::helper('affiliateplus')->__('Account Number')
        ));
        $fieldset->addField('routing_code', 'label', array(
            'label' => Mage::helper('affiliateplus')->__('Routing Code')
        ));
        $fieldset->addField('swift_code', 'label', array(
            'label' => Mage::helper('affiliateplus')->__('Swift Code')
        ));
        $fieldset->addField('statement', 'image', array(
            'label' => Mage::helper('affiliateplus')->__('Bank Statement')
        ));
        
        $form->addValues($data);
        
        return parent::_prepareForm();
    }
}
