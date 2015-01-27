<?php

class Auth_Form_AdminLogin extends Zend_Form 
{
    /**
     * Initialize admin login form
     */
    public function init() {
        
        $view = Zend_Layout::getMvcInstance()->getView();
        
        $this->setMethod('POST');
        
        $this->addElement('text', 'login', array(
            'placeholder' => $view->translate('Enter login'),
            'required' => true,
            'class' => 'width-100',
            'decorators' => array('ViewHelper')
        ));
        
        $this->addElement('password', 'password', array(
            'placeholder' => $view->translate('Enter password'),
            'required' => true,
            'class' => 'width-100',
            'decorators' => array('ViewHelper')
        ));
        
        $this->addElement('submit', 'submit', array(
            'label' => $view->translate('Go'),
            'class' => 'btn btn-blue',
            'decorators' => array('ViewHelper')
        ));
        
    }
}
