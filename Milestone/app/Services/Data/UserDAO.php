<?php
namespace App\Services\Data;

use Exception;
use \PDO;
use PDOException;
use App\Models\User;

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
        $charset = 'utf8mb4';
        
        $dsn = "mysql:host=$host;dbname=$schema;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        
        //set DB connection with PDO
        try
        {
            $conn = new PDO($dsn, $uername, $password, $options);
            return $conn;
            echo "Connection Successful";
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
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
    public function create(User $user)
    {        
        $query = 'INSERT INTO laravel.Users(USER_NAME,FNAME,LNAME,EMAIL,PHONE,PASSWORD,STREET,STATE,ZIP) VALUES(USER_NAME=?,
        FNAME=?,LNAME=?,EMAIL=?,PHONE=?,PASSWORD=?,STREET=?,STATE=?,ZIP=?)';
        
        try
        {
            $stmt=$this->dbConnect()->prepare($query);
            $stmt->execute([$user->getUsername(),$user->getFName(),$user->getLName(),$user->getEmail(),$user->getPhone(),
            $user->getPassword(),$user->getStreet(),$user->getState(),$user->getZip()]);
            $this->dbClose();
            return $stmt->rowCount();
        }
        catch (Exception $e)
        {
            // TODO: Route to global exception
            echo $e->getMessage();
        }
    }
    
    /**
     * Creates a function to get all users in the database
     */
    public function readAll()
    {
        $query = "SELECT * FROM laravel.Users";
        $users = array();
        try 
        {
            while ($row = $this->dbConnect()->setAttribute($query)) 
            {
                // push each row returned into the array
                $users[] = $row;
            }
            
            $this->dbClose();        
            return $users;
        } 
        catch (Exception $e) 
        {
            // TODO: Route to global exception
            echo 'Message: Oops, something went wrong';
        }
        
    }
    
    /**
     * Creates a function that will update an object in the database
     */
    public function update(User $user)
    {
        $query = "UPDATE laravel.Users SET USER_NAME=".$user->getUsername() .
        ", FNAME=".$user->getFName() .
        ", LNAME=".$user->getLName() .
        ", EMAIL=".$user->getEmail() .
        ", PHONE=".$user->getPhone() .
        ", PASSWORD=".$user->getPassword() .
        ", STREET=".$user->getStreet() .
        ", STATE=".$user->getState() .
        ", ZIP=".$user->getZip() .
        ", WHERE USER_ID=".$user->getUserID();
        
        $result = $this->dbConnect()->query($query);
        $this->dbClose();
        if (!$result)
            return 1;        
        else 
            return 2;
        
    }
    
    public function delete(User $user)
    {
        // This will contain SQL to delete a given user
    }
    
    public function find($username)
    {
        $query = 'SELECT * FROM laravel.Users WHERE USER_NAME =?';
        
        $stmt = $this->dbConnect()->prepare($query);
        $stmt->execute([$username]);
        $user = new User($stmt->fetch());
        $this->dbClose();
        
        if(is_null($user))
        {
            return 2;
        }
        else 
        {
            return 1;
        }        
    }
}

?>
