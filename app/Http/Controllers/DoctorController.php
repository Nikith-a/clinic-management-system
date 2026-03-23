<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    // Admin only — full list with actions
    public function index()
    {
        if (auth()->user()->role === 'admin') {
            $doctors = Doctor::latest()->paginate(10);
            return view('doctors.index', compact('doctors'));
        }

        // Receptionist and patient — view only by specialization
        $specializations = Doctor::select('specialization')->distinct()->get();
        $selectedSpec    = request('specialization');
        $doctors         = $selectedSpec
                            ? Doctor::where('specialization', $selectedSpec)->get()
                            : Doctor::all();

        return view('doctors.view', compact('doctors', 'specializations', 'selectedSpec'));
    }

    public function create()
    {
        return view('doctors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'           => 'required',
            'phone'          => 'required',
            'specialization' => 'required',
        ]);

        Doctor::create($request->all());
        return redirect()->route('doctors.index')->with('success', 'Doctor added successfully!');
    }

    public function edit(Doctor $doctor)
    {
        return view('doctors.edit', compact('doctor'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'name'           => 'required',
            'phone'          => 'required',
            'specialization' => 'required',
        ]);

        $doctor->update($request->all());
        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully!');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully!');
    }
}