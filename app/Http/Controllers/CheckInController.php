<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckInController extends Controller
{
    public function store(Request $request)
    {
        // Your check-in logic goes here.
        // For example, you might save data to the database.

        // After performing the action, redirect back with a success message.
        return redirect()->back()->with('status', 'Check-in successfully.');
    }
}
