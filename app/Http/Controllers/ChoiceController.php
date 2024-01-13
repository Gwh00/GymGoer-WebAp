<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChoiceController extends Controller
{
    public function classInformation()
{
    $classes = [
        ['id' => 1, 'name' => 'Yoga', 'description' => 'Relaxing yoga session', 'price' => '$10'],
        ['id' => 2, 'name' => 'Pilates', 'description' => 'Energizing pilates workout', 'price' => '$12'],
        // ... add more classes as needed
    ];

    return view('user.classinfo', compact('classes'));
}

    public function buyClass($id)
{
    // Here, you can handle the purchasing logic like integrating with a payment gateway.
    // For now, we'll just return a dummy response.
    
    return redirect()->route('classinfo')->with('success', 'Class purchased successfully!');
}

}
