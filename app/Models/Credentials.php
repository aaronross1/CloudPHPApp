<?php
namespace App\Models;

/**
 * A Class to hold the login credentials for a user
 * @author Tim/Aaron
 *
 */
class Credentials
{
    private $username;
    private $password;
    
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }
    
    public function getUsername()
    {
        return $this->username;
    }
    
    public function getPassword()
    {
        return $this->password;
    }
}