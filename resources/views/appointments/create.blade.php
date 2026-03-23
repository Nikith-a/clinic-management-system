@extends('layouts.app')
@section('content')

<div class="card" style="max-width: 600px">
    <div class="card-header bg-dark text-white">Add New Appointment</div>
    <div class="card-body">

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('appointments.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Patient</label>
                <select name="patient_id" class="form-control">
                    <option value="">-- Select Patient --</option>
                    @foreach($patients as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Doctor</label>
                <select name="doctor_id" class="form-control">
                    <option value="">-- Select Doctor --</option>
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->name }} - {{ $doctor->specialization }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Appointment Date</label>
                <input type="date" name="appointment_date" class="form-control" value="{{ old('appointment_date') }}">
            </div>
            <div class="mb-3">
                <label>Appointment Time</label>
                <input type="time" name="appointment_time" class="form-control" value="{{ old('appointment_time') }}">
            </div>
            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="pending">Pending</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Notes</label>
                <textarea name="notes" class="form-control">{{ old('notes') }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Save Appointment</button>
            <a href="{{ route('appointments.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

@endsection