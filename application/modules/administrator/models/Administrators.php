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
        $userId = 0;
        
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
    
    public function updateUser($id, $name, $password, $email, $salt)
    {
        if($password != null) {
            $this->update(array(
                        'name' => $name,
                        'email' => $email,
                        'password' => Helix_Password::generatePassword($password, $salt)
                        ), 'id = ' . $id);
        } else {
            $this->update(array(
                        'name' => $name,
                        'email' => $email,
                        ), 'id = ' . $id);
        }
        
        return true;
        
    }
    
    public function deleteUser($id)
    {
        $this->delete('id = ' . $id);
        return true;
        
    }
    /**
     * Check if user already exist
     * @param string $name
     * @param string $email
     * @return boolean
     */
    public function checkExist($name, $email)
    {
        $query = $this->select()
                    ->where('name = ?', $name)
                    ->orWhere('email = ?', $email);
        $result = $this->fetchAll($query);
        if(count($result) == 0) {
            return false;
        }
        
        return true;
    }
    
    /**
     * Get all administrator
     * @return mixed
     */
    
    public function getAdministrators()
    {
        $result = $this->select()
                    ->order('id DESC');
        
        if(count($result) == 0) {
            return false;
        }
        
        return $result;
    }
    
    /**
     * Get administrator by id
     * @return mixed
     */
    
    public function getAdministrator($id)
    {
        if($id == null) {
            return false;
        }
        
        $query = $this->select()
                    ->where('id = ?', $id);
        
        $result = $this->fetchRow($query);
        if(count($result) == 0) {
            return false;
        }
        
        return $result;
    }
}