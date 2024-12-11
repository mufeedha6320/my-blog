@extends('templates.main')
@section('content')
    <div class="container mt-5 col-md-5">
        <h2 class="mb-4">User Login</h2>

        <form action="{{ route('user.authenticate') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

@endsection
