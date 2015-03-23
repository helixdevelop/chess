<?php

class Administrator_ManagementController extends Zend_Controller_Action
{
    
    public function init()
    {
        if(!Zend_Auth::getInstance()->hasIdentity()) {
            $redirector = new Zend_Controller_Action_Helper_Redirector();
            $redirector->setGotoRoute(array(), 'admin-panel');
        }
        Zend_Layout::getMvcInstance()->setLayout('admin');
    }
    
    public function indexAction()
    {   
        $administratorModel = new Administrator_Model_Administrators();
        $administrators = $administratorModel->getAdministrators();
        
        $adapter = new Zend_Paginator_Adapter_DbTableSelect($administrators);
        $paginator = new Zend_Paginator($adapter);
        $paginator->setCurrentPageNumber($this->getRequest()->getParam('page', 1));
        
        $this->view->administrators = $paginator;
        
    }
    
    public function addAction()
    {   
        $redirector = new Zend_Controller_Action_Helper_Redirector();
        $administratorModel = new Administrator_Model_Administrators();
        $form = new Administrator_Form_AddEdit();
        
        if($this->getRequest()->isPost() 
            && $form->isValid($this->getRequest()->getParams())) {
                $name = $form->getValue('name');
                $password = $form->getValue('password');
                $email = $form->getValue('email');
                
                if(!$administratorModel->checkExist($name, $email)) {
                    $result = $administratorModel->createUser($name, $password, $email);
                    
                    if($result > 0) {
                        Notification_Model_Notify::setNotify(Notification_Model_Notify::DATA_SAVED,
                            Notification_Model_Notify::SUCCESS);
                        $redirector->setGotoRoute(array(), 'administrator-management');
                    } else {
                        Notification_Model_Notify::setNotify(Notification_Model_Notify::ERROR_OCCURED,
                            Notification_Model_Notify::ERROR);
                        $form->populate($this->getRequest()->getParams());
                    }
                }
            }
        $this->view->form = $form;
    }
    
    public function editAction()
    {   
        $redirector = new Zend_Controller_Action_Helper_Redirector();
        $administratorModel = new Administrator_Model_Administrators();
        $form = new Administrator_Form_AddEdit(false);
        
        $administrator = $administratorModel->getAdministrator($this->getRequest()->getParam('id', null));
        if($this->getRequest()->isPost() 
            && $form->isValid($this->getRequest()->getParams())) { 
                $name = $form->getValue('name');
                $password = $form->getValue('password');
                $email = $form->getValue('email');
                
                try {
                    $result = $administratorModel->updateUser($administrator['id'], 
                        $name, $password, $email, $administrator['salt']);
                    Notification_Model_Notify::setNotify(Notification_Model_Notify::DATA_SAVED,
                        Notification_Model_Notify::SUCCESS);
                    $redirector->setGotoRoute(array(), 'administrator-management');
                } catch (Exception $ex) {
                    Notification_Model_Notify::setNotify(Notification_Model_Notify::ERROR_OCCURED,
                        Notification_Model_Notify::ERROR);
                }
            }
            
        $administratorArray = $administrator->toArray();
        $administratorArray['password'] = null;
        $form->populate($administratorArray);
        $this->view->form = $form;
    }
    
    public function deleteAction()
    {   
        $redirector = new Zend_Controller_Action_Helper_Redirector();
        $administratorModel = new Administrator_Model_Administrators();
        $id = $this->getRequest()->getParam('id', null);
        
        try {
            $administratorModel->deleteUser($id);
            Notification_Model_Notify::setNotify(Notification_Model_Notify::DATA_SAVED,
                Notification_Model_Notify::SUCCESS);
        } catch (Exception $ex) {
            Notification_Model_Notify::setNotify(Notification_Model_Notify::ERROR_OCCURED,
                Notification_Model_Notify::ERROR);
        }
        
        $redirector->setGotoRoute(array(), 'administrator-management');
    }
    
}