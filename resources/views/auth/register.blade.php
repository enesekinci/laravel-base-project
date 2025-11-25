@extends('layouts.store')

@section('title', 'Register')

@section('content')
    <div class="page-header">
        <div class="container d-flex flex-column align-items-center">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Register</li>
                    </ol>
                </div>
            </nav>

            <h1>Create An Account</h1>
        </div>
    </div>

    <div class="container login-container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="heading mb-1">
                    <h2 class="title">Register</h2>
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

                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <label for="register-name">
                        Full Name
                        <span class="required">*</span>
                    </label>
                    <input type="text" class="form-input form-wide" id="register-name" name="name" value="{{ old('name') }}" required />

                    <label for="register-email">
                        Email address
                        <span class="required">*</span>
                    </label>
                    <input type="email" class="form-input form-wide" id="register-email" name="email" value="{{ old('email') }}" required />

                    <label for="register-phone">Phone</label>
                    <input type="text" class="form-input form-wide" id="register-phone" name="phone" value="{{ old('phone') }}" />

                    <label for="register-password">
                        Password
                        <span class="required">*</span>
                    </label>
                    <input type="password" class="form-input form-wide" id="register-password" name="password" required />

                    <label for="register-password-confirmation">
                        Confirm Password
                        <span class="required">*</span>
                    </label>
                    <input type="password" class="form-input form-wide" id="register-password-confirmation" name="password_confirmation" required />

                    <div class="form-footer mb-2">
                        <button type="submit" class="btn btn-dark btn-md w-100 mr-0">Register</button>
                    </div>
                </form>

                <div class="text-center mt-3">
                    <p>
                        Zaten hesabınız var mı?
                        <a href="{{ route('login') }}">Giriş yapın</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
