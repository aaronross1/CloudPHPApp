<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //index function
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        
        $data = ['username' => $username];
        return view('loginSuccess')->with($data);
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
        
        $data = ['username' => $username];
        return view('registerSuccess')->with($data);
    }
    
    public function home()
    {
        return view('welcome');
    }
}
