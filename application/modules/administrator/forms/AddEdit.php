<?php

class Administrator_Form_AddEdit extends Zend_Form 
{
    protected $_add;
    
    public function __construct($isAdd = true) {
        $this->_add = $isAdd;
        parent::__construct();
    }
    
    /**
     * Initialize admin add/edit form
     */
    public function init() {
        
        $view = Zend_Layout::getMvcInstance()->getView();
        
        $this->setMethod('POST');
        
        if($this->_add) {
            $this->setAction($view->url(array(), 'administrator-add'));
        } else {
            $this->setAction($view->url(array(), 'administrator-edit'));
        }
        
        $this->addElement('text', 'name', array(
            'placeholder' => $view->translate('Enter name'),
            'required' => true,
            'class' => 'width-100',
            'filters'    => array('StringTrim'),
            'decorators' => array('ViewHelper'),
            'validators' => array(
                'alnum',
                array(
                    'validator'     => 'StringLength',
                    'options'       => array(6, 20)
                )
            )
        ));
        
        $this->addElement('text', 'email', array(
            'placeholder' => $view->translate('Enter e-mail'),
            'required' => true,
            'class' => 'width-100',
            'filters'    => array('StringTrim'),
            'decorators' => array('ViewHelper'),
            'validators' => array('emailAddress')
        ));
        
        $this->addElement('text', 'password', array(
            'placeholder' => $view->translate('Enter password'),
            'required' => true,
            'class' => 'width-100',
            'filters'    => array('StringTrim'),
            'decorators' => array('ViewHelper'),
            'validators' => array(
                'alnum',
                array(
                    'validator'     => 'StringLength',
                    'options'       => array(6, 20)
                )
            )
        ));
        
        if(!$this->_add) {
            $this->getElement('password')->setRequired(false);
        }
        
        $this->addElement('submit', 'submit', array(
            'label' => $view->translate('Save'),
            'class' => 'btn btn-blue',
            'decorators' => array('ViewHelper')
        ));
        
    }
}
