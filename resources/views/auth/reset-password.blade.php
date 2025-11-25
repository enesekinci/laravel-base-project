@extends('layouts.auth')

@section('title', 'Reset Password')

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

    <form action="{{ route('password.update') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}" />

        <p style="margin-bottom: 20px; color: #666;">
            Please enter your new password.
        </p>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $email) }}" required readonly style="background-color: #f5f5f5;" />
        </div>

        <div class="form-group">
            <label for="password">New Password</label>
            <input type="password" id="password" name="password" required />
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required />
        </div>

        <button type="submit" class="btn">Reset Password</button>

        <div class="form-footer">
            <a href="{{ route('login') }}">Back to Login</a>
        </div>
    </form>
@endsection
