<?php

class Admin_IndexController extends Zend_Controller_Action
{
    
    public function init()
    {
        Zend_Layout::getMvcInstance()->setLayout('admin');
    }
    
    public function indexAction()
    {
        $form = new Auth_Form_AdminLogin();
        $this->view->form = $form;
    }
}