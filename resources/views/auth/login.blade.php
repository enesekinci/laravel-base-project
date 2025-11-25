@extends('layouts.store')

@section('title', 'Login')

@section('content')
    <div class="page-header">
        <div class="container d-flex flex-column align-items-center">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">My Account</li>
                    </ol>
                </div>
            </nav>

            <h1>My Account</h1>
        </div>
    </div>

    <div class="container login-container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="row">
                    <div class="col-md-6">
                        <div class="heading mb-1">
                            <h2 class="title">Login</h2>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <label for="login-email">
                                Email address
                                <span class="required">*</span>
                            </label>
                            <input type="email" class="form-input form-wide" id="login-email" name="email" value="{{ old('email') }}" required />

                            <label for="login-password">
                                Password
                                <span class="required">*</span>
                            </label>
                            <input type="password" class="form-input form-wide" id="login-password" name="password" required />

                            <div class="form-footer">
                                <div class="custom-control custom-checkbox mb-0">
                                    <input type="checkbox" class="custom-control-input" id="remember" name="remember" />
                                    <label class="custom-control-label mb-0" for="remember">Remember me</label>
                                </div>

                                <a href="{{ route('password.forgot') }}" class="forget-password text-dark form-footer-right">Forgot Password?</a>
                            </div>
                            <button type="submit" class="btn btn-dark btn-md w-100">LOGIN</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="heading mb-1">
                            <h2 class="title">Register</h2>
                        </div>

                        <p class="mb-2">Yeni müşteri misiniz? Hemen kayıt olun!</p>
                        <a href="{{ route('register') }}" class="btn btn-dark btn-md w-100">CREATE AN ACCOUNT</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
