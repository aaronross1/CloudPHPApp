<?php
/**
 * Database management class for Users that contains functions for all the CRUD methods
 * @author Tim/Aaron
 *        
 */
class UserDAO
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
     * Creates a function that will add a user to the database
     */
    public function create($user)
    {
        $query = "INSERT INTO laravel.Users(USER_NAME,FNAME,LNAME,EMAIL,PHONE,PASSWORD,STREET,STATE,ZIP) VALUES(" .
        $user->getCredentials()->getUsername().",".$user->getFName().",".$user->getLName().",".$user->getEmail().",".$user->getPhone().",".
        $user->getCredentials()->getPassword().",".$user->getStreet().",".$user->getState().",".$user->getZip().")";
        
        $result=$this->dbConnect()->setAttribute($query);
        $this->dbClose();
        return $result;
    }
    
    /**
     * Creates a function to get all users in the database
     */
    public function readAll()
    {
        $query = "SELECT * FROM laravel.Users";
        $users = array();
        
        while($row=$this->dbConnect()->setAttribute($query))
        {
            // push each row returned into the array
            $users[] = $row;
        }
        $this->dbClose();
        
        return $users;
    }
    
    /**
     * Creates a function that will update an object in the database
     */
    public function update($user)
    {
        $query = "UPDATE laravel.Users SET USER_NAME=".$user->getCredentials()->getUsername() .
        ", FNAME=".$user->getFName() .
        ", LNAME=".$user->getLName() .
        ", EMAIL=".$user->getEmail() .
        ", PHONE=".$user->getPhone() .
        ", PASSWORD=".$user->getCredentials()->getPassword() .
        ", STREET=".$user->getStreet() .
        ", STATE=".$user->getState() .
        ", ZIP=".$user->getZip() .
        ", WHERE USER_ID=".$user->getUserID();
        
        $result=$this->dbConnect()->setAttribute($query);
        $this->dbClose();
        return $result;
    }
    
    public function delete($user)
    {
        // This will contain SQL to delete a given user
    }
}

?>
