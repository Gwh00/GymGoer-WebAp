<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller {
    public function addEvent(Request $request) {
        $event = new Event; // Replace with your event model
        $event->title = $request->input('title');
        $event->start_date = $request->input('start');
        $event->end_date = $request->input('end');
        $event->save();

        return response()->json(['message' => 'Event added successfully']);
    }
}