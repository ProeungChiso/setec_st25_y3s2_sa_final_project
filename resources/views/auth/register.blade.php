@extends('layout.auth.main')

@section('title', 'Register')

@section('content')
    <div class="container">
        <div class="login-container">
            <!-- Back to Home Button -->
            <div class="back-to-home">
                <a href="/" class="">
                    <i class="fas fa-arrow-left me-2"></i>
                </a>
            </div>

            <h2 class="text-center mb-4 text-uppercase"><span class="title">Techie</span> Register</h2>
            <form action="{{url('/register')}}" method="post">
                @csrf
                <div class="d-flex gap-3">
                    <div class="form-floating mb-3">
                        <input name="firstname" type="text" class="form-control" id="floatingInput" placeholder="firstname">
                        <label for="floatingInput" class="text-black-50">First Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="lastname" type="text" class="form-control" id="floatingInput" placeholder="lastname">
                        <label for="floatingInput" class="text-black-50">Last Name</label>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input name="username" type="text" class="form-control" id="floatingInput" placeholder="username">
                    <label for="floatingInput" class="text-black-50">Username</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput" class="text-black-50">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                    <label for="password" class="text-black-50">Password</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="confirmed_password" type="password" class="form-control" id="confirmed_password" placeholder="Confirmed Password">
                    <label for="confirmed_password" class="text-black-50">Confirmed Password</label>
                </div>

                <div class="d-flex justify-content-between mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="showPassword">
                        <label class="form-check-label" for="showPassword">
                            Show Password
                        </label>
                    </div>
                </div>

                <button class="btn btn-login w-100 py-2 mb-3" type="submit">
                    Register
                </button>

                <div class="text-center">
                    <p class="mb-0">Already have an account? <a href="{{url('/login')}}" class="text-decoration-none">Log In</a></p>
                </div>

            </form>
        </div>
    </div>

    <script>

        let btnCheck = document.getElementById('showPassword')
        let inputPassword = document.getElementById('password')
        let inputConfirmedPassword = document.getElementById('confirmed_password')

        btnCheck.addEventListener('change', function (){
            inputPassword.type = btnCheck.checked ? 'text' : 'password';
            inputConfirmedPassword.type = btnCheck.checked ? 'text' : 'password';
        })

    </script>
@endsection
