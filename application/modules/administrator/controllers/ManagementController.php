<?php

class Administrator_ManagementController extends Zend_Controller_Action
{
    
    public function init()
    {
        Zend_Layout::getMvcInstance()->setLayout('admin');
    }
    
    public function indexAction()
    {   
        $administratorModel = new Administrator_Model_Administrators();
        $administrators = $administratorModel->getAdministrators();
        
        $adapter = new Zend_Paginator_Adapter_DbTableSelect($administrators);
        $paginator = new Zend_Paginator($adapter);
        
        $this->view->administrators = $paginator;
        
    }
    
}