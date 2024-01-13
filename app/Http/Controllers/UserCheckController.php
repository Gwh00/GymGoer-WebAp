<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserCheckController extends Controller
{
    public function checkIn(Request $request)
    {
        // Handle check-in logic
        // Example: Update user status in the database

        return back()->with('status', 'Checked in successfully');
    }

    public function checkOut(Request $request)
    {
        // Handle check-out logic
        // Example: Update user status in the database

        return back()->with('status', 'Checked out successfully');
    }
}
