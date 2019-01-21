<?php
namespace App\Services\Business;

use App\Models\User;
use App\Services\Data\UserDAO;

class RegisterService
{
    public function registerUser(User $user)
    {        
        // Test the user info with an echo statement
//         echo '<p>User first name in the business service is '.$user->getFName().'</p>';
        
        $data = new UserDAO();
        $exists = $data->find($user->getUsername());
        
        // Check if the username already exists
        if(!$exists)
        {        
            // Call the data function to create the new user and return 1
//             echo 'The number of rows in the database is now: ';
            $data->create($user);
            return 1;
        }
        elseif ($exists)
        {
            // return 2 if there is already an existing user with that username
            return 2;
        }
        else 
        {
            // Return 3 if something went wrong
            return 3;
        }
    }
}