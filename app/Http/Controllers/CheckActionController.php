<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckActionController extends Controller
{
    public function handleAction(Request $request)
    {
        // Retrieve user ID from the authenticated user or session
        $userId = auth()->user()->id;

        // Determine the action (check_in or check_out)
        $action = $request->input('action');

        // Perform the action logic (update user status in the database, etc.)
        // For now, let's just store the action in the session
        session()->put('status', "User ID $userId has checked $action.");

        return redirect()->back();
    }
}
