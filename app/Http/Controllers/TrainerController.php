<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function index()
    {
        $trainers = [
            ['id' => 1, 'name' => 'John Doe', 'specialty' => 'Aerobics', 'Certification' => '5 years'],
            ['id' => 2, 'name' => 'Jane Smith', 'specialty' => 'Yoga', 'Certification' => '3 years'],
            // ... add more trainers as needed
        ];

        return view('user.personaltrainer', compact('trainers'));
    }
}
