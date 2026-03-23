@extends('layouts.app')
@section('title', 'Our Doctors')
@section('content')

<div class="mb-4">
    <h4 style="font-weight:700; color:#1a1f2e">Find a Doctor</h4>
    <p style="color:#a0aec0; font-size:14px">Browse our doctors by specialization</p>
</div>

{{-- Filter by Specialization --}}
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('doctors.index') }}" class="d-flex gap-3 align-items-end">
            <div style="flex:1">
                <label class="form-label">Filter by Specialization</label>
                <select name="specialization" class="form-control">
                    <option value="">-- All Specializations --</option>
                    @foreach($specializations as $spec)
                        <option value="{{ $spec->specialization }}"
                            {{ $selectedSpec == $spec->specialization ? 'selected' : '' }}>
                            {{ $spec->specialization }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-search"></i> Search
                </button>
                <a href="{{ route('doctors.index') }}" class="btn btn-secondary">Clear</a>
            </div>
        </form>
    </div>
</div>

{{-- Doctors Cards --}}
<div class="row g-3">
    @forelse($doctors as $doctor)
    <div class="col-md-4">
        <div class="card h-100">
            <div class="card-body text-center p-4">
                <div style="width:70px; height:70px; background:#e8f0fe;
                            border-radius:50%; margin:0 auto 16px;
                            display:flex; align-items:center; justify-content:center;">
                    <i class="bi bi-person-badge" style="font-size:30px; color:#4f8ef7"></i>
                </div>
                <h5 style="font-weight:700; color:#1a1f2e; margin-bottom:4px">
                    Dr. {{ $doctor->name }}
                </h5>
                <span style="background:#e8f0fe; color:#4f8ef7;
                             padding:4px 12px; border-radius:20px;
                             font-size:12px; font-weight:600">
                    {{ $doctor->specialization }}
                </span>
                <hr style="margin:16px 0">
                <div class="text-start">
                    <p style="font-size:13px; color:#4a5568; margin-bottom:8px">
                        <i class="bi bi-telephone me-2" style="color:#4f8ef7"></i>
                        {{ $doctor->phone }}
                    </p>
                    <p style="font-size:13px; color:#4a5568; margin-bottom:8px">
                        <i class="bi bi-envelope me-2" style="color:#4f8ef7"></i>
                        {{ $doctor->email ?? 'Not provided' }}
                    </p>
                    @if($doctor->address)
                    <p style="font-size:13px; color:#4a5568; margin-bottom:0">
                        <i class="bi bi-geo-alt me-2" style="color:#4f8ef7"></i>
                        {{ $doctor->address }}
                    </p>
                    @endif
                </div>
            </div>
            {{-- Book Appointment button for patients --}}
            @if(auth()->user()->role === 'patient')
            <div class="card-footer bg-white border-top-0 text-center pb-4">
                <a href="{{ route('appointments.create') }}?doctor_id={{ $doctor->id }}"
                   class="btn btn-primary w-100">
                    <i class="bi bi-calendar-plus me-1"></i> Book Appointment
                </a>
            </div>
            @endif
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="card text-center p-5">
            <i class="bi bi-person-x" style="font-size:48px; color:#a0aec0"></i>
            <p class="mt-3" style="color:#a0aec0">No doctors found for this specialization</p>
        </div>
    </div>
    @endforelse
</div>

@endsection