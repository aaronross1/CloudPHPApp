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
        $uername = 'q19batuntyhnwbvk';
        $password = 'yx6nkcsc96gose04';
        $host = 'wm63be5w8m7gs25a.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
        $schema = 'lffg46jo4owbitcg';
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
        // Test the user info with an echo statement
//         echo '<p>User first name in the data service is '.$user->getFName().'</p>';
        
        $query = 'INSERT INTO lffg46jo4owbitcg.users(USER_NAME,FNAME,LNAME,EMAIL,PHONE,PASSWORD,STREET,STATE,ZIP) VALUES(:username,
        :fname,:lname,:email,:phone,:password,:street,:state,:zip)';
        
        try
        {
            $stmt=$this->dbConnect()->prepare($query);
            
            $stmt->execute([
                'username'  => $user->getUsername(),
                'fname'     => $user->getFName(),
                'lname'     => $user->getLName(),
                'email'     => $user->getEmail(),
                'phone'     => $user->getPhone(),
                'password'  => $user->getPassword(),
                'street'    => $user->getStreet(),
                'state'     => $user->getState(),
                'zip'       => $user->getZip()]);
            
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
        $query = "SELECT * FROM lffg46jo4owbitcg.Users";
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
        $query = "UPDATE lffg46jo4owbitcg.Users SET USER_NAME=".$user->getUsername() .
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
        $query = 'SELECT * FROM lffg46jo4owbitcg.users WHERE USER_NAME=?';
        
        $stmt = $this->dbConnect()->prepare($query);
        $stmt->execute([$username]);
        $user = new User();
        $i = 0;
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {            
            $user->setUserID($row['USER_ID']);
            $user->setUsername($row['USER_NAME']);
            $user->setFName($row['FNAME']);
            $user->setLName($row['LNAME']);
            $user->setEmail($row['EMAIL']);
            $user->setPhone($row['PHONE']);
            $user->setPassword($row['PASSWORD']);
            $user->setStreet($row['STREET']);
            $user->setState($row['STATE']);
            $user->setZip($row['ZIP']);
            ++$i;
        }
        
//         echo '<p>username name from the data service is '.$username.'</p>';
//         echo '<p>first name from the data service is '.$user->getFName().'</p>';
        
        if($i == 0)
        {            
            return false;
        }
        else 
        {
            return $user;
        }        
    }
}

?>
