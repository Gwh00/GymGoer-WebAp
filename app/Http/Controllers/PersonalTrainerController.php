<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalTrainer;
use App\Models\Classname;

class PersonalTrainerController extends Controller
{
    public function showPersonalTrainer()
    {
        $personaltrainer = PersonalTrainer::all();
        return view('personaltrainer', compact('personaltrainer'));
    }

    public function showPersonalTrainer2()
    {
        $personaltrainer = PersonalTrainer::all();
        return view('personaltrainer2', compact('personaltrainer'));
    }

    public function showAddPersonalTrainerForm()
    {
        return view('addpersonaltrainerform');
    }

    public function showDetail()
    {
        $personaltrainer = PersonalTrainer::all();
        $class = ClassName::all();
        return view('detail', compact('personaltrainer','class'));
        
    }

    public function storePersonalTrainer(Request $request)
    {
        // Validate the input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|', // changed to personal_trainers
            'certification' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);
    
        // Create a new personal trainer record in the database
        PersonalTrainer::create($validatedData);
    
        return redirect()->route('personaltrainer')->with('success', 'personal trainer added successfully!');
    }
    
    public function edit($id)
    {
        $personaltrainerMember = PersonalTrainer::findOrFail($id);
        return view('editcoachform', compact('personaltrainerMember'));
    }
    
    public function updatepersonaltrainer(Request $request, $id)
    {
     
        // Validate the request
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'certification' => 'required|string',
            'phone' => 'required|string',
        ]);

        $personalTrainer = PersonalTrainer::findOrFail($id);

        // Update the record
        $email = $request->input('email');
        $newName = $request->input('name');
        $newCertification = $request->input('certification');
        $newphone = $request->input('phone');

        $personalTrainer = PersonalTrainer::where('email', $email)->first();

        if ($personalTrainer) {
            $personalTrainer->name = $request->input('name');
            $personalTrainer->email = $request->input('email');
            $personalTrainer->Certification = $request->input('certification');
            $personalTrainer->phone = $request->input('phone');
            $personalTrainer->save();
            return redirect()->route('personaltrainer')->with('success', 'Personal Trainer updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Personal Trainer not found.');
        }
    }
    

    public function destroy($id)
    {
        $personaltrainer = PersonalTrainer::findOrFail($id); // fixed to PersonalTrainer
        $personaltrainer->delete();

        return redirect()->route('personaltrainer')->with('success', 'personal trainer deleted successfully!');
    }
}
