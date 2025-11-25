@extends('layouts.auth')

@section('title', 'Login')

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

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="login-email">
                Email address
                <span class="required">*</span>
            </label>
            <input type="email" id="login-email" name="email" value="{{ old('email') }}" required />
        </div>

        <div class="form-group">
            <label for="login-password">
                Password
                <span class="required">*</span>
            </label>
            <input type="password" id="login-password" name="password" required />
        </div>

        <div class="form-group">
            <label>
                <input type="checkbox" name="remember" />
                Remember me
            </label>
        </div>

        <button type="submit" class="btn">LOGIN</button>

        <div class="form-footer">
            <a href="{{ route('password.forgot') }}">Forgot Password?</a>
        </div>
    </form>

    <div class="text-center">
        <p>
            Don't have an account?
            <a href="{{ route('register') }}">Register</a>
        </p>
    </div>
@endsection
