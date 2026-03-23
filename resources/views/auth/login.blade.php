<!DOCTYPE html>
<html>
<head>
    <title>Login - Clinic MS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5" style="max-width: 450px">
    <div class="card shadow">
        <div class="card-header bg-dark text-white text-center">
            <h4>🏥 Clinic Management System</h4>
            <p class="mb-0">Login to your account</p>
        </div>
        <div class="card-body">

            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>
                <button type="submit" class="btn btn-dark w-100">Login</button>
            </form>

        </div>
        <div class="card-footer text-center">
            Don't have an account? <a href="{{ route('register') }}">Sign up here</a>
        </div>
    </div>
</div>

</body>
</html>