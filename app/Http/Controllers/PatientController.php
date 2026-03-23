<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    // Show all patients
    public function index()
    {
        $patients = Patient::latest()->paginate(10);
        return view('patients.index', compact('patients'));
    }

    // Show create form
    public function create()
    {
        return view('patients.create');
    }

    // Save new patient
    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required',
            'phone'  => 'required',
            'gender' => 'required',
            'dob'    => 'required|date',
        ]);

        Patient::create($request->all());
        return redirect()->route('patients.index')->with('success', 'Patient added successfully!');
    }

    // Show edit form
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    // Update patient
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'name'   => 'required',
            'phone'  => 'required',
            'gender' => 'required',
            'dob'    => 'required|date',
        ]);

        $patient->update($request->all());
        return redirect()->route('patients.index')->with('success', 'Patient updated successfully!');
    }

    // Delete patient
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Patient deleted successfully!');
    }
}