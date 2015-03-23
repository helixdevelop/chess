<?php

class Admin_Bootstrap extends Zend_Application_Module_Bootstrap
{
    /**
     * Initialize routing for Admin module
     */
    protected function _initRouting() {
        
        $router = Zend_Controller_Front::getInstance()->getRouter();
        
        $route['admin-panel'] = new Zend_Controller_Router_Route(
            '@admin',
            array(
                'module' => 'admin',
                'controller' => 'index',
                'action' => 'index'
            )
        );
        
        $route['admin-logout'] = new Zend_Controller_Router_Route(
            '@admin/@logout',
            array(
                'module' => 'admin',
                'controller' => 'index',
                'action' => 'logout'
            )
        );
        
        $router->addRoutes($route);
    }

}
    