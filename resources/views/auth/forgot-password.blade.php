@extends('layouts.auth')

@section('title', 'Forgot Password')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('password.email') }}" method="POST">
        @csrf

        <p style="margin-bottom: 20px; color: #666;">
            Lost your password? Please enter your email address. You will receive a link to create a new password via email.
        </p>

        <div class="form-group">
            <label for="reset-email">Email address</label>
            <input type="email" id="reset-email" name="email" value="{{ old('email') }}" required />
        </div>

        <button type="submit" class="btn">Reset Password</button>

        <div class="form-footer">
            <a href="{{ route('login') }}">Back to Login</a>
        </div>
    </form>
@endsection
