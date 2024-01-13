<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function show()
    {
        $user = auth()->user(); // Assuming the user is authenticated
        return view('userprofile', compact('user'));
    }
}
