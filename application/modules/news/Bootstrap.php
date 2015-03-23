<?php

class News_Bootstrap extends Zend_Application_Module_Bootstrap
{    
    /**
     * Initialize routing for News module
     */
    protected function _initRouting() {
        
        $router = Zend_Controller_Front::getInstance()->getRouter();
        
        $route['news-management'] = new Zend_Controller_Router_Route(
            '@admin/@news/@management/:page',
            array(
                'module' => 'administrator',
                'controller' => 'news',
                'action' => 'index',
                'page' => 1
            )
        );
        
        $route['news-add'] = new Zend_Controller_Router_Route(
            '@admin/@news/@add',
            array(
                'module' => 'administrator',
                'controller' => 'news',
                'action' => 'add'
            )
        );
        
        $route['news-edit'] = new Zend_Controller_Router_Route(
            '@admin/@news/@edit/:id',
            array(
                'module' => 'administrator',
                'controller' => 'news',
                'action' => 'edit',
                'id' => null
            )
        );
        
        $route['news-delete'] = new Zend_Controller_Router_Route(
            '@admin/@news/@delete/:id',
            array(
                'module' => 'administrator',
                'controller' => 'news',
                'action' => 'delete',
                'id' => null
            )
        );

        $router->addRoutes($route);
    }
}

