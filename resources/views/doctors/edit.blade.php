@extends('layouts.app')
@section('content')

<div class="card" style="max-width: 600px">
    <div class="card-header bg-dark text-white">Edit Doctor</div>
    <div class="card-body">

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('doctors.update', $doctor->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ $doctor->name }}">
            </div>
            <div class="mb-3">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" value="{{ $doctor->phone }}">
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $doctor->email }}">
            </div>
            <div class="mb-3">
                <label>Specialization</label>
                <input type="text" name="specialization" class="form-control" value="{{ $doctor->specialization }}">
            </div>
            <div class="mb-3">
                <label>Address</label>
                <textarea name="address" class="form-control">{{ $doctor->address }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Update Doctor</button>
            <a href="{{ route('doctors.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

@endsection