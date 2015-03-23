<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    /**
     * Initialize translation
     */
    protected function _initTranslation()
    {
        $locale = new Zend_Locale('pl_PL');
        Zend_Registry::set('Zend_Locale', $locale);

        $options = array(
            'adapter'   =>  'tmx',
            'content'   =>  APPLICATION_PATH . '/configs/translations.tmx',
            'locale'    =>  $locale 
        );
        $translator = new Zend_Translate($options);
        Zend_Registry::set('Zend_Translate', $translator);
    }
    
        
    /**
     * Initialize navigation for Admin module
     */
    protected function _initNavigation() {
        
        $navigationAdminConfig = new Zend_Config_Xml(APPLICATION_PATH . '/configs/admin_navigation.xml');
        $navigationAdmin = new Zend_Navigation($navigationAdminConfig);
        
        $this->bootstrap('layout');
        $layout = $this->getResource('layout');
        $view = $layout->getView();
        $view->navigation($navigationAdmin) ;
    
    }

}

