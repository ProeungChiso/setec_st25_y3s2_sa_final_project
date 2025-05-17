@extends('layout.auth.main')

@section('title', 'Login')

@section('content')
    <div class="container">
        <div class="login-container">
            <!-- Back to Home Button -->
            <div class="back-to-home">
                <a href="{{url('/')}}" class="">
                    <i class="fas fa-arrow-left me-2"></i>
                </a>
            </div>

            <h2 class="text-center mb-4 text-uppercase"><span class="title">Techie</span> Login</h2>
            <form action="{{url('/login')}}" method="post">
                @csrf
                <div class="form-floating mb-3">
                    <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput" class="text-black-50">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword" class="text-black-50">Password</label>
                </div>

                <div class="d-flex justify-content-between mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="showPassword">
                        <label class="form-check-label" for="showPassword">
                            Show Password
                        </label>
                    </div>
                    <a href="{{url('/reset-password')}}" class="text-decoration-none">Forgot password?</a>
                </div>

                <button class="btn btn-login w-100 py-2 mb-3" type="submit">
                    Login
                </button>

                <div class="text-center">
                    <p class="mb-0">Don't have an account? <a href="{{url('/register')}}" class="text-decoration-none">Register</a></p>
                </div>
            </form>
        </div>
    </div>

    <script>
        let getPasswordType = document.getElementById('floatingPassword');
        let getChecked = document.getElementById('showPassword');

        getChecked.addEventListener('change', function () {
            if (this.checked) {
                getPasswordType.type = 'text';
            } else {
                getPasswordType.type = 'password';
            }
        });


    </script>
@endsection
