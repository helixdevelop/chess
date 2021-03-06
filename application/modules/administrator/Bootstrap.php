<?php

class Administrator_Bootstrap extends Zend_Application_Module_Bootstrap
{
    /**
     * Initialize routing for Administrator module
     */
    protected function _initRouting() {
        
        $router = Zend_Controller_Front::getInstance()->getRouter();
        
        $route['administrator-management'] = new Zend_Controller_Router_Route(
            '@admin/@administrator/@management/:page',
            array(
                'module' => 'administrator',
                'controller' => 'management',
                'action' => 'index',
                'page' => 1
            )
        );
        
        $route['administrator-add'] = new Zend_Controller_Router_Route(
            '@admin/@administrator/@add',
            array(
                'module' => 'administrator',
                'controller' => 'management',
                'action' => 'add'
            )
        );
        
        $route['administrator-edit'] = new Zend_Controller_Router_Route(
            '@admin/@administrator/@edit/:id',
            array(
                'module' => 'administrator',
                'controller' => 'management',
                'action' => 'edit',
                'id' => null
            )
        );
        
        $route['administrator-delete'] = new Zend_Controller_Router_Route(
            '@admin/@administrator/@delete/:id',
            array(
                'module' => 'administrator',
                'controller' => 'management',
                'action' => 'delete',
                'id' => null
            )
        );

        $router->addRoutes($route);
    }
}

