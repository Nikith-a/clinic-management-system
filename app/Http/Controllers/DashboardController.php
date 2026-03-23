<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Appointment;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPatients        = Patient::count();
        $totalDoctors         = Doctor::count();
        $totalAppointments    = Appointment::count();
        $pendingAppointments  = Appointment::where('status', 'pending')->count();
        $completedAppointments = Appointment::where('status', 'completed')->count();
        $cancelledAppointments = Appointment::where('status', 'cancelled')->count();
        $todayAppointments    = Appointment::whereDate('appointment_date', today())->count();
        $recentAppointments   = Appointment::with('patient', 'doctor')
                                ->latest()->take(5)->get();

        return view('dashboard', compact(
            'totalPatients',
            'totalDoctors',
            'totalAppointments',
            'pendingAppointments',
            'completedAppointments',
            'cancelledAppointments',
            'todayAppointments',
            'recentAppointments'
        ));
    }
}