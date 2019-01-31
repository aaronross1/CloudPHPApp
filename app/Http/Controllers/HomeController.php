<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Business\LoginService;
use App\Services\Business\RegisterService;
use App\Models\User;

class HomeController extends Controller
{
    //index function
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        
        // Call the business service to verify the credentials
        $service = new LoginService();
        $auth = $service->authorizeUser($username, $password);
        if($auth == 2)
        {
            // Render the new view with binded data
            $data = ['username' => $username];
            return view('loginSuccess')->with($data);
        }
        elseif ($auth == 1)
        {
            // Render the login view again with error message
            echo 'YOUR LOGIN CREDENTIALS WERE INCORRECT, PLEASE TRY AGAIN';           
        }
        else 
        {
            // Render the login view again with error message
            echo 'Oops! Something went wrong, please try again later.';
        }
    }
    
    public function register(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $fName = $request->input('fName');
        $lName = $request->input('lName');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $street = $request->input('street');
        $state = $request->input('state');
        $zip = $request->input('zip');   
        
        // set all attributes to a new User object
        $user = new User();
        $user->setUsername($username);
        $user->setPassword($password);
        $user->setFName($fName);
        $user->setLName($lName);
        $user->setEmail($email);
        $user->setPhone($phone);
        $user->setStreet($street);
        $user->setState($state);
        $user->setZip($zip);
        
        // Call the business service to check if username already exists and if not, then add user to database        
        $service = new RegisterService();
        $nUser = $service->registerUser($user);
        if($nUser == 1)
        {
            // Render the new view with binded data
            $data = ['username' => $user->getUsername()];
            return view('registerSuccess')->with($data);
        }
        elseif ($nUser == 2)
        {
            // Display an error message
            echo 'The Username you entered already exists. Please try again.';
        }
        else 
        {
            // Display an error message
            echo 'Oops! Something went wrong, please try again later.';
        }
    }
    
    public function home()
    {
        return view('welcome');
    }
    
    public function getLogin()
    {
        return view('login');
    }
}
