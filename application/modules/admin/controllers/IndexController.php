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
        $redirector = new Zend_Controller_Action_Helper_Redirector();

        if(!Zend_Auth::getInstance()->hasIdentity()) {
            $authModel = new Auth_Model_Auth();

            if($this->getRequest()->isPost() 
                    && $form->isValid($this->getRequest()->getParams())) {
                $login = $form->getValue('login');
                $password = $form->getValue('password');

                if($login != null && $password != null) {
                    $result = $authModel->login(Auth_Model_Auth::AUTH_ADMINISTRATOR, $login, $password);
                    if(!$result) {
                        $form->populate($this->getRequest()->getParams());
                    } else {
                        $redirector->setGotoRoute(array(), 'admin-panel');
                    }
                }
            }
            $this->view->form = $form;
        }
    }
    
    public function logoutAction()
    {        
        $authModel = new Auth_Model_Auth();
        $authModel->logout();
        
        $redirector = new Zend_Controller_Action_Helper_Redirector();
        $redirector->setGotoRoute(array(), 'admin-panel');
    }
}