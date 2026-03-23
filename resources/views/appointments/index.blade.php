@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Appointments List</h2>
    <a href="{{ route('appointments.create') }}" class="btn btn-primary">+ Add Appointment</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-hover bg-white">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Patient</th>
            <th>Doctor</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($appointments as $appointment)
        <tr>
            <td>{{ $loop->iteration }}</td>
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
            <td>
                <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $appointments->links() }}

@endsection