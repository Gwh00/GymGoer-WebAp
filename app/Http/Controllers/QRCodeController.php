<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckActionController extends Controller
{
    public function handleAction(Request $request)
    {
        $action = $request->input('action');

        if ($action == 'check_in') {
            // Logic for checking in
            $message = 'Check-in successfully.';
        } elseif ($action == 'check_out') {
            // Logic for checking out
            $message = 'Check-out successfully.';
        } else {
            // Default message or handling
            $message = 'Invalid action.';
        }

        return redirect()->back()->with('status', $message);
    }

    public function generateQRCode(Request $request, $userName)
    {
        // Retrieve user information based on user ID
        $user = User::find($userName);

        // Generate personalized QR code data
        $qrCodeData = [
            'user_id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'age' => $user->age,
            'body_type' => $user->body_type,
            // Add more user-specific data if needed
        ];

        // Convert the data to a JSON string (or any format you prefer)
        $qrCodeDataString = json_encode($qrCodeData);

        // Generate the QR code using the data
        $qrCode = QrCode::size(300)->generate($qrCodeDataString);

        // Pass the QR code and user information to the view
        return view('qr_code', compact('qrCode', 'user'));
    }
}
