@extends('layouts.store')

@section('title', 'Reset Password')

@section('content')
    <div class="page-header">
        <div class="container d-flex flex-column align-items-center">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Reset Password</li>
                    </ol>
                </div>
            </nav>

            <h1>Reset Password</h1>
        </div>
    </div>

    <div class="container reset-password-container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="feature-box border-top-primary">
                    <div class="feature-box-content">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="mb-0" action="{{ route('password.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}" />

                            <p>Yeni şifrenizi belirleyin.</p>

                            <div class="form-group">
                                <label for="email" class="font-weight-normal">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $email) }}" required readonly />
                            </div>

                            <div class="form-group">
                                <label for="password" class="font-weight-normal">New Password</label>
                                <input type="password" class="form-control" id="password" name="password" required />
                            </div>

                            <div class="form-group mb-0">
                                <label for="password_confirmation" class="font-weight-normal">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required />
                            </div>

                            <div class="form-footer mb-0">
                                <a href="{{ route('login') }}">Click here to login</a>

                                <button type="submit" class="btn btn-md btn-primary form-footer-right font-weight-normal text-transform-none mr-0">Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
