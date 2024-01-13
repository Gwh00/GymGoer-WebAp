<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function profile()
    {
        $user = auth()->user();
        return view('userhome', compact('user'));
    }
}
