<?php

class Helix_Password
{
    /**
     * Function use salt to generate password
     * @param string $password
     * @param string $salt
     * @return string
     */
    public static function generatePassword($password, $salt)
    {
        return sha1($salt . $password . $salt);
    }
}