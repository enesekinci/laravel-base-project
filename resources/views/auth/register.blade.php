@extends('layouts.auth')

@section('title', 'Register')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="register-name">
                Full Name
                <span class="required">*</span>
            </label>
            <input type="text" id="register-name" name="name" value="{{ old('name') }}" required />
        </div>

        <div class="form-group">
            <label for="register-email">
                Email address
                <span class="required">*</span>
            </label>
            <input type="email" id="register-email" name="email" value="{{ old('email') }}" required />
        </div>

        <div class="form-group">
            <label for="register-phone">Phone</label>
            <input type="text" id="register-phone" name="phone" value="{{ old('phone') }}" />
        </div>

        <div class="form-group">
            <label for="register-password">
                Password
                <span class="required">*</span>
            </label>
            <input type="password" id="register-password" name="password" required />
        </div>

        <div class="form-group">
            <label for="register-password-confirmation">
                Confirm Password
                <span class="required">*</span>
            </label>
            <input type="password" id="register-password-confirmation" name="password_confirmation" required />
        </div>

        <button type="submit" class="btn">Register</button>
    </form>

    <div class="text-center">
        <p>
            Already have an account?
            <a href="{{ route('login') }}">Login</a>
        </p>
    </div>
@endsection
