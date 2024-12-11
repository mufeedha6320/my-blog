@extends('templates.main')
@section('content')
    <div class="container mt-5 col-md-5">
        <h2 class="mb-4">User Registration</h2>

        <form action="{{ route('do.user.register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                <div id="password-match-error" style="color: red; display: none;">Enter a matching password.</div>
            </div>

            <button type="submit" class="btn btn-primary" id="register" disabled>Register</button>

        </form>
    </div>

    <script>
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('password_confirmation');
        const errorMessage = document.getElementById('password-match-error');
        const registerButton = document.getElementById('register');

        password.addEventListener('input', checkPasswordMatch);
        confirmPassword.addEventListener('input', checkPasswordMatch);

        function checkPasswordMatch() {
            if (password.value === confirmPassword.value) {
                errorMessage.style.display = 'none';
                registerButton.disabled = false;
            } else {
                errorMessage.style.display = 'block';
                registerButton.disabled = true;
            }
        }
    </script>

@endsection
