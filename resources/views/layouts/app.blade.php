<!DOCTYPE html>
<html>
<head>
    <title>Clinic Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
    <a class="navbar-brand" href="{{ route('dashboard') }}">🏥 Clinic MS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('patients*') ? 'active' : '' }}" href="{{ route('patients.index') }}">Patients</a>
            </li>
            <li class="nav-item">
                @if(auth()->user()->role === 'admin')
                    <a class="nav-link {{ request()->is('doctors*') ? 'active' : '' }}" href="{{ route('doctors.index') }}">
                    <i class="bi bi-person-badge"></i> Manage Doctors
                    </a>
                @else
                    <a class="nav-link {{ request()->is('doctors*') ? 'active' : '' }}" href="{{ route('doctors.index') }}">
                    <i class="bi bi-person-badge"></i> Our Doctors
                     </a>
                @endif
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('appointments*') ? 'active' : '' }}" href="{{ route('appointments.index') }}">Appointments</a>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
               <span class="nav-link text-white">👤 {{ Auth::user()->name ?? 'Guest' }}</span>
            </li>
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-sm btn-danger mt-1">Logout</button>
                </form>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>