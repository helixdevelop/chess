<?php

class Notification_Model_Notify 
{
    const SUCCESS = 1;
    const ERROR = 2;
    
    /* Success messages */
    const DATA_SAVED = 'Data has been saved sucessfully';
    
    /* Error messages */
    const ERROR_OCCURED = 'Some error occured';

    public static function setNotify($message, $type) {
        $session = new Zend_Session_Namespace('notification');
        $session->message[$type][] = $message;
    }
    
    public static function getNotify() {
        $session = new Zend_Session_Namespace('notification');
        return $session->message;
    }
    
    public static function clearNotify() {
        Zend_Session::namespaceUnset('notification');
    }
    
    
}