<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //index function
    public function index(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        
        $data = ['username' => $firstName];
        return view('loginSuccess')->with($data);
    }
    
    public function home()
    {
        return view('welcome');
    }
}
