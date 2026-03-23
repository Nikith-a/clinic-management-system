@extends('layouts.app')
@section('content')

<div class="card" style="max-width: 600px">
    <div class="card-header bg-dark text-white">Edit Appointment</div>
    <div class="card-body">

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Patient</label>
                <select name="patient_id" class="form-control">
                    @foreach($patients as $patient)
                        <option value="{{ $patient->id }}" {{ $appointment->patient_id == $patient->id ? 'selected' : '' }}>
                            {{ $patient->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Doctor</label>
                <select name="doctor_id" class="form-control">
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}" {{ $appointment->doctor_id == $doctor->id ? 'selected' : '' }}>
                            {{ $doctor->name }} - {{ $doctor->specialization }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Appointment Date</label>
                <input type="date" name="appointment_date" class="form-control" value="{{ $appointment->appointment_date }}">
            </div>
            <div class="mb-3">
                <label>Appointment Time</label>
                <input type="time" name="appointment_time" class="form-control" value="{{ $appointment->appointment_time }}">
            </div>
            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="pending"   {{ $appointment->status == 'pending'   ? 'selected' : '' }}>Pending</option>
                    <option value="completed" {{ $appointment->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="cancelled" {{ $appointment->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Notes</label>
                <textarea name="notes" class="form-control">{{ $appointment->notes }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Update Appointment</button>
            <a href="{{ route('appointments.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

@endsection
```

---

### After updating all files test these URLs
```
http://localhost:8000/dashboard
http://localhost:8000/doctors
http://localhost:8000/appointments