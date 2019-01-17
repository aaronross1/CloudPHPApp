<?php
namespace Management;

use PDO;
use PDOException;

/**
 * Database management class for Users that contains functions for all the CRUD methods
 * @author Tim/Aaron
 *        
 */
class dbManagement
{    
    /**
     * function to get dbconnection
     */
    public function dbConnect()
    {        
        // create variables for the connection information
        $uername = 'root';
        $password = 'root';
        $host = 'localhost';
        $schema = 'laravel';
        
        //set DB connection with PDO
        try
        {
            $conn = new PDO("mysql:host=$host;dbname=$schema", $uername, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connection Successful";
            return TRUE;
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
            return FALSE;
        }        
    }
    
    /**
     * function to close db connection
     */
    public function dbClose()
    {
        $this->connection = null;
    }
    
    /**
     * Creates a function that will update an object in the database
     */
    public function update($user)
    {
		$query = "UPDATE laravel.Users SET USER_NAME=".$user->getUsername() .
		", FNAME=".$user->getFName() .
		", LNAME=".$user->getLName() .
		", EMAIL=".$user->getEmail() .
		", PHONE=".$user->getPhone() .
		", PASSWORD=".$user->getPassword() .
		", ADDRESS=".$user->getAddress() .
		", WHERE USER_ID=".$user->getUserID();
		
        $result=$this->dbConnect()->setAttribute($query);
        $this->dbClose();
        return $result;
    }
}

?>
