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
								<form class="mb-0" method="POST" action="{{ route('password.email') }}">
                                    @csrf
									<p>
										Lost your password? Please enter your
										username or email address. You will receive
										a link to create a new password via email.
									</p>
									<div class="form-group mb-0">
										<label for="reset-email" class="font-weight-normal">Username or email</label>
										<input type="email" class="form-control @error('email') is-invalid @enderror" id="reset-email" name="email"
											required value="{{ old('email') }}" />
                                        @error('email')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
									</div>

									<div class="form-footer mb-0">
										<a href="{{ route('login') }}">Click here to login</a>

										<button type="submit"
											class="btn btn-md btn-primary form-footer-right font-weight-normal text-transform-none mr-0">
											Reset Password
										</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
@endsection
