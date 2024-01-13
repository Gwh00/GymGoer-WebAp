<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home'); // general home view after login but before any role-based redirection
    }

    public function adminHome(){
        return view('admin-home');
    }
}


