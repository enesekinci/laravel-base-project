@extends('layouts.porto')

@section('top-notice')
    @include('pages.top-notice')
@endsection

@section('header')
    @include('pages.header')
@endsection

@section('footer')
    @include('pages.footer')
@endsection

@section('content')
<div class="page-header">
				<div class="container d-flex flex-column align-items-center">
					<nav aria-label="breadcrumb" class="breadcrumb-nav">
						<div class="container">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('page', ['page' => 'index']) }}">{{ __('Home') }}</a></li>
								<li class="breadcrumb-item"><a href="{{ route('page', ['page' => 'shop']) }}">{{ __('Shop') }}</a></li>
								<li class="breadcrumb-item active" aria-current="page">
									{{ __('My Account') }}
								</li>
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

								<form action="{{ route('login') }}" method="POST">
                                    @csrf
									<label for="login-email">
										Username or email address
										<span class="required">*</span>
									</label>
									<input type="email" class="form-input form-wide @error('email') is-invalid @enderror" id="login-email" name="email" value="{{ old('email') }}" required />

									<label for="login-password">
										Password
										<span class="required">*</span>
									</label>
									<input type="password" class="form-input form-wide @error('password') is-invalid @enderror" id="login-password" name="password" required />
                                    @error('email')
                                        <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror

									<div class="form-footer">
										<div class="custom-control custom-checkbox mb-0">
											<input type="checkbox" class="custom-control-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }} />
											<label class="custom-control-label mb-0" for="remember">Remember
												me</label>
										</div>

										<a href="{{ route('password.request') }}"
											class="forget-password text-dark form-footer-right">Forgot
											Password?</a>
									</div>
									<button type="submit" class="btn btn-dark btn-md w-100">
										LOGIN
									</button>
								</form>
							</div>
							<div class="col-md-6">
								<div class="heading mb-1">
									<h2 class="title">Register</h2>
								</div>

								<form action="{{ route('register') }}" method="POST">
                                    @csrf
									<label for="register-email">
										Email address
										<span class="required">*</span>
									</label>
									<input type="email" class="form-input form-wide @error('register_email') is-invalid @enderror" id="register-email" name="email" value="{{ old('email') }}" required />

									<label for="register-password">
										Password
										<span class="required">*</span>
									</label>
									<input type="password" class="form-input form-wide" id="register-password"
										required name="password" />

                                    <label for="register-password-confirm">
										{{ __('Confirm Password') }}
										<span class="required">*</span>
									</label>
									<input type="password" class="form-input form-wide"
										required name="password_confirmation" id="register-password-confirm" />

									<div class="form-footer mb-2">
										<button type="submit" class="btn btn-dark btn-md w-100 mr-0">
											Register
										</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
@endsection
