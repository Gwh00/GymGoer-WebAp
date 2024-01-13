<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timetable;
use App\Http\Controllers\Auth;

class TimetableController extends Controller
{
    public function create()
    {
        return view('timetable.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'class' => 'required|string',
            'personaltrainer' => 'required|string',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'day' => 'required|string|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
        ]);

        Timetable::create($validatedData);
        return redirect()->route('timetable.index')->with('success', 'Timetable entry added!');
    }

    public function index()
    {
        $timetableEntries = Timetable::all();
        return view('timetable', ['entries' => $timetableEntries]);
    }

    public function edit($id)
    {
        $entry = Timetable::findOrFail($id);
        return view('timetable.edit', compact('entry'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
        
            'name' => 'required',
            'name' => 'string',
            'email' => 'required|email',
            'email' => 'unique:users,email',
            'password' => 'required|confirmed',
            'password' => 'min:8',
            'age' => 'min:18|max:120',
            'color' => 'in:red,blue,green',
            'birthdate' => 'date_format:Y-m-d',
            'username' => 'regex:/^[A-Za-z0-9_]{3,16}$/',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'numeric|between:0,99.99',
            'is_active' => 'boolean',

        ]);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'birthdate' => 'required|date_format:Y-m-d',
            'avatar' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'boolean'
        ]);

        $entry = Timetable::findOrFail($id);
        $entry->update($validatedData);
        return redirect()->route('timetable.index')->with('success', 'Timetable entry updated!');
    }

    public function destroy($id)
    {
        $entry = Timetable::findOrFail($id);
        $entry->delete();
        return redirect()->route('timetable.index')->with('success', 'Timetable entry deleted!');
    }

    public function __construct() 
{
    $this->middleware('auth');
    $this->middleware(function ($request, $next) {
        $entry = Timetable::find($request->route('timetable')); // get the 'timetable' parameter from the route
        if ($entry && $entry->user_id !== auth()->id()) {
            return redirect()->route('timetable.index')->with('error', 'Unauthorized action.');
        }
        return $next($request);
    })->only(['edit', 'update', 'destroy']);
}

}

