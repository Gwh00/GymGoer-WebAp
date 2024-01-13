<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassName;

class ClassController extends Controller
{

    public function showClass()
    {
        $class = ClassName::all();
        return view('/class', compact('class'));
    }

    public function showClass2()
    {
        $class = ClassName::all();
        return view('/class2', compact('class'));
    }

    public function addClass2(Request $request)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'class_name' => 'required|string|max:255',
            'class_code' => 'required|string|unique:class_names',
            'class_description' => 'required|string|max:1000',
            'coachname' => 'required|string|max:255',
        ]);

        // Create a new ClassName model and save it to the database
        $class = ClassName::create($data);

        // You can do something with the created class if needed

        return redirect()->route('classes.create')->with('success', 'Class added successfully!');
    }

    public function showAddClassForm(Request $request)
    {
  
        return view('/addClassform');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data here
        $validatedData = $request->validate([
            'class_name' => 'required|string|max:255',
            'class_code' => 'required|string|max:50',
            'class_description' => 'required|string|max:1000',
            'coachname' => 'required|string|max:255',
        ]);

        // Create and store the class using the validated data
        ClassName::create($validatedData);

        // Redirect to a success page or do whatever you need
        return redirect()->route('classes.create')->with('success', 'Class added successfully!');
    }

    public function edit($id)
    {

        $classDetail = ClassName::findOrFail($id);
        return view('editclassform', compact('classDetail'));

    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'class_name' => 'required|string|max:255',
            'class_code' => 'required|string|max:50',
            'class_description' => 'required|string|max:1000',
            'coachname' => 'required|string|max:255',
        ]);

        $classDetail = ClassName::findOrFail($id);
        $classDetail->update($validatedData);

        return redirect()->route('classes.create')->with('success', 'Class updated successfully!');

    }
    
    public function destroy($id)
    {
        $classDetail = ClassName::findOrFail($id); // fixed to PersonalTrainer
        $classDetail->delete();

        return redirect()->route('classes.create')->with('success', 'personal trainer deleted successfully!');
    }
}