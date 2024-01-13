<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserTimetableController extends Controller
{
    public function index()
    {
        $timetable = [
            ['day' => 'Monday', 'start_time' => '08:00', 'end_time' => '09:00', 'activity' => 'Yoga'],
            ['day' => 'Tuesday', 'start_time' => '10:00', 'end_time' => '11:00', 'activity' => 'Weight Lifting'],
            // ... Add more entries as needed
        ];

        return view('usertimetable', compact('timetable'));
    }

    public function index2()
    {
        $timetable = [
            ['day' => 'Monday', 'start_time' => '08:00', 'end_time' => '09:00', 'activity' => 'Yoga'],
            ['day' => 'Tuesday', 'start_time' => '10:00', 'end_time' => '11:00', 'activity' => 'Weight Lifting'],
            // ... Add more entries as needed
        ];

        return view('usertimetable2', compact('timetable'));
    }
}
