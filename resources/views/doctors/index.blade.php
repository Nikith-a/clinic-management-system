@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Doctors List</h2>
    <a href="{{ route('doctors.create') }}" class="btn btn-primary">+ Add Doctor</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-hover bg-white">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Specialization</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($doctors as $doctor)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $doctor->name }}</td>
            <td>{{ $doctor->phone }}</td>
            <td>{{ $doctor->email ?? '-' }}</td>
            <td>{{ $doctor->specialization }}</td>
            <td>
                <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $doctors->links() }}

@endsection