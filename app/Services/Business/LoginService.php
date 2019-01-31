<?php
namespace App\Services\Business;

use App\Services\Data\UserDAO;

class LoginService
{
    /**
     * Checks to see if the user exists in the database and if so, verifies the password
     * @param $username, $password
     */
    public function authorizeUser($username, $password)
    {
        // Check if the users exists
        $data = new UserDAO();
        $user = $data->find($username);
//         echo '<p>first name from the business service is '.$user->getFName().'</p>';
        
        if(is_null($user))
        {
            // return 1 if username doesn't exist
            return 1;
        }
        elseif($user->getCredentials()->getPassword() !== $password)
        {
            // return 1 if password is incorrect
            return 1;
        }
        elseif($user->getCredentials()->getPassword() === $password)
        {
            // return 2 if password is correct
            return 2;
        }
        else
        {
            // return 3 if there was something that went wrong
            return 3;
        }

    }
}