<?php
namespace App\Models;

class User
{
    private $userID;    
    private $fName;
    private $lName;
    private $email;
    private $phone;    
    private $street;
    private $state;
    private $zip;
    private $username;
    private $password;
    
    //getters and setters functions
    public function getUserID()
    {
        return $this->userID;
    }

    public function getFName()
    {
        return $this->fName;
    }

    public function getLName()
    {
        return $this->lName;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getStreet()
    {
        return $this->street;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getZip()
    {
        return $this->zip;
    }
    
    public function getUsername()
    {
        return $this->username;
    }
    
    public function getPassword()
    {
        return $this->password;
    }

    public function setUserID($userID)
    {
        $this->userID = $userID;
    }

    public function setFName($fName)
    {
        $this->fName = $fName;
    }

    public function setLName($lName)
    {
        $this->lName = $lName;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function setStreet($street)
    {
        $this->street = $street;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function setZip($zip)
    {
        $this->zip = $zip;
    }
    
    public function setUsername($username)
    {
        $this->username = $username;
    }
    
    public function setPassword($password)
    {
        $this->password = $password;
    }

}
