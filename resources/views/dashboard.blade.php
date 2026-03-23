@extends('layouts.app')
@section('content')

<h4 class="mb-4">Welcome, {{ Auth::user()->name }}! 👋</h4>

<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h6 class="card-title">Total Patients</h6>
                <h2>{{ $totalPatients }}</h2>
                <a href="{{ route('patients.index') }}" class="text-white">View all →</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h6 class="card-title">Total Doctors</h6>
                <h2>{{ $totalDoctors }}</h2>
                <a href="{{ route('doctors.index') }}" class="text-white">View all →</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-info">
            <div class="card-body">
                <h6 class="card-title">Total Appointments</h6>
                <h2>{{ $totalAppointments }}</h2>
                <a href="{{ route('appointments.index') }}" class="text-white">View all →</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <h6 class="card-title">Today's Appointments</h6>
                <h2>{{ $todayAppointments }}</h2>
                <a href="{{ route('appointments.index') }}" class="text-white">View all →</a>
            </div>
        </div>
    </div>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card border-warning">
            <div class="card-body">
                <h6 class="text-warning">Pending</h6>
                <h3>{{ $pendingAppointments }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-success">
            <div class="card-body">
                <h6 class="text-success">Completed</h6>
                <h3>{{ $completedAppointments }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-danger">
            <div class="card-body">
                <h6 class="text-danger">Cancelled</h6>
                <h3>{{ $cancelledAppointments }}</h3>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header bg-dark text-white">Recent Appointments</div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Patient</th>
                    <th>Doctor</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentAppointments as $appointment)
                <tr>
                    <td>{{ $appointment->patient->name }}</td>
                    <td>{{ $appointment->doctor->name }}</td>
                    <td>{{ $appointment->appointment_date }}</td>
                    <td>{{ $appointment->appointment_time }}</td>
                    <td>
                        @if($appointment->status == 'pending')
                            <span class="badge bg-warning">Pending</span>
                        @elseif($appointment->status == 'completed')
                            <span class="badge bg-success">Completed</span>
                        @else
                            <span class="badge bg-danger">Cancelled</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection