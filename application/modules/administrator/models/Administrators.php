<?php

class Administrator_Model_Administrators extends Zend_Db_Table_Abstract
{
    protected $_name = 'administrators';
    protected $_primary = 'id';
    
    /**
     * Method create new administrator
     * @param string $name
     * @param string $password
     * @param string $email
     * @return int
     */
    public function createUser($name, $password, $email)
    {
        $salt = md5(uniqid());
        
        $userData = array(
            'salt' => $salt,
            'name' => $name,
            'email' => $email,
            'password' => Helix_Password::generatePassword($password, $salt)
        );
        
        $db = $this->getAdapter();
        $db->beginTransaction();
        
        try {
            $userId = $this->insert($userData);
            $db->commit();
        } catch (Exception $ex) {
            $db->rollBack();
            throw new Exception('Problem occured when create user: ' . 
                    var_export($ex->getMessage(), true));
        }
        
        return (int)$userId;
        
    }
    
    /**
     * Check if user already exist
     * @param string $name
     * @param string $email
     * @return boolean
     */
    public function checkExist($name, $email)
    {
        $result = $this->select()
                    ->where('name = ?', $name)
                    ->where('email = ?', $email)
                    ->query();
        
        if(count($result) == 0) {
            return false;
        }
        
        return true;
    }
}