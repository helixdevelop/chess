<?php

class Administrator_Bootstrap extends Zend_Application_Module_Bootstrap
{
    /**
     * Initialize routing for Administrator module
     */
    protected function _initRouting() {
        
        $router = Zend_Controller_Front::getInstance()->getRouter();
        
        $route['administrator-management'] = new Zend_Controller_Router_Route(
            '@administrator/@management',
            array(
                'module' => 'administrator',
                'controller' => 'management',
                'action' => 'index'
            )
        );
        
        $route['administrator-add'] = new Zend_Controller_Router_Route(
            '@administrator/@add',
            array(
                'module' => 'administrator',
                'controller' => 'management',
                'action' => 'add'
            )
        );
        
        $route['administrator-edit'] = new Zend_Controller_Router_Route(
            '@administrator/@edit',
            array(
                'module' => 'administrator',
                'controller' => 'management',
                'action' => 'edit'
            )
        );
        
        $route['administrator-remove'] = new Zend_Controller_Router_Route(
            '@administrator/@remove',
            array(
                'module' => 'administrator',
                'controller' => 'management',
                'action' => 'remove'
            )
        );

        $router->addRoutes($route);
    }
}

