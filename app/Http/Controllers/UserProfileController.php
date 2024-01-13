<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use App\Models\User;
use Carbon\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function show()
    {
        $user = User::all();
        return view('userprofile', compact('user'));
    }

    public function show2()
    {
        $user = auth()->user(); // Assuming the user is authenticated

        $url = url('/qr-page-target');

        // Generate the QR code
        $qrCode = QrCode::size(300)->generate($url);
        return view('userprofile2', compact('user','qrCode'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('editprofile2', compact('user'));
    }


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'body_type' => 'required|in:Cuting,Normal,Bulking', // Validation for body_type

            // Add other validation rules as needed
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->body_type = $request->input('body_type'); // Save the selected body_type


        // Calculate age based on the selected date
        $birthDate = Carbon::parse($request->input('birth_date'));
        $user->age = $birthDate->age;

        // Save other fields if needed

        $user->save();

        return redirect()->route('userprofile2')->with('success', 'Profile updated successfully!');
    }

    public function index()
    {
        $users = User::all(); // Fetch all users
        return view('userprofile', compact('users'));
    }

    public function showUsers() 
    {
        $users = User::all();
    return view('userprofile', compact('users'));
    }

}