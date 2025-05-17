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

            <h2 class="text-center mb-4 text-uppercase"><span class="title">Techie</span> Reset Password</h2>
            <form action="{{url('/reset-password')}}" method="post">
                @csrf
                <div class="form-floating mb-3">
                    <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput" class="text-black-50">Email address</label>
                </div>

                <button class="btn btn-login w-100 py-2 mb-3" type="submit">
                    Submit
                </button>

                <div class="text-center">
                    <p class="mb-0">Don't have an account? <a href="{{url('/register')}}" class="text-decoration-none">Register</a></p>
                </div>
            </form>
        </div>
    </div>
@endsection
