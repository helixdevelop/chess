<?php

class Auth_Model_Auth 
{
    const AUTH_ADMINISTRATOR = 'administrators';
    const AUTH_USER = 'users';

    public function login($type, $identity, $password) {
        
        $adapter = new Zend_Auth_Adapter_DbTable(
                    Zend_Db_Table::getDefaultAdapter(), 
                    $type, 
                    'email', 
                    'password', 
                    'SHA1(CONCAT(salt, ?, salt))'
                );
        $adapter->setIdentity($identity);
        $adapter->setCredential($password);
        
        $auth = Zend_Auth::getInstance();

        $result = $auth->authenticate($adapter);

        if ($result->isValid()) {
            return true;
        }
        
        return false;
    }
    
    public function logout() {
        Zend_Auth::getInstance()->clearIdentity();
    }
}