@extends('layouts.porto')

@section('header')
    @include('components.porto.header')
@endsection

@section('content')
<nav aria-label="breadcrumb" class="breadcrumb-nav">
				<div class="container">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="{{ route('page', ['page' => 'index']) }}"><i class="icon-home"></i></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Contact Us
						</li>
					</ol>
				</div>
			</nav>

			<div id="map"></div>

			<div class="container contact-us-container">
				@if($contactDescription || (!empty($contactInfoBoxes) && count($contactInfoBoxes) > 0))
					<div class="contact-info">
						<div class="row">
							@if($contactDescription)
								<div class="col-12">
									<h2 class="ls-n-25 m-b-1">
										{{ __('Contact Us') }}
									</h2>
									<p>{{ $contactDescription }}</p>
								</div>
							@endif

							@if(!empty($contactInfoBoxes) && count($contactInfoBoxes) > 0)
								@foreach($contactInfoBoxes as $infoBox)
									<div class="col-sm-6 col-lg-3">
										<div class="feature-box text-center">
											@if($infoBox['icon'])
												<i class="{{ $infoBox['icon'] }}"></i>
											@endif
											<div class="feature-box-content">
												@if($infoBox['title'])
													<h3>{{ $infoBox['title'] }}</h3>
												@endif
												@if($infoBox['subtitle'])
													<h5>{{ $infoBox['subtitle'] }}</h5>
												@endif
												@if($infoBox['description'])
													<p>{{ $infoBox['description'] }}</p>
												@endif
											</div>
										</div>
									</div>
								@endforeach
							@endif
						</div>
					</div>
				@endif

				<div class="row">
					<div class="col-lg-6">
						<h2 class="mt-6 mb-2">Send Us a Message</h2>

						<form class="mb-0" action="#">
							<div class="form-group">
								<label class="mb-1" for="contact-name">
									{{ __('Your Name') }}
									<span class="required">*</span></label>
								<input type="text" class="form-control" id="contact-name" name="contact-name"
									required />
							</div>

							<div class="form-group">
								<label class="mb-1" for="contact-email">
									{{ __('Your E-mail') }}
									<span class="required">*</span></label>
								<input type="email" class="form-control" id="contact-email" name="contact-email"
									required />
							</div>

							<div class="form-group">
								<label class="mb-1" for="contact-message">
									{{ __('Your Message') }}
									<span class="required">*</span></label>
								<textarea cols="30" rows="1" id="contact-message" class="form-control"
									name="contact-message" required></textarea>
							</div>

							<div class="form-footer mb-0">
								<button type="submit" class="btn btn-dark font-weight-normal">
									{{ __('Send Message') }}
								</button>
							</div>
						</form>
					</div>

					@if(!empty($faqs) && count($faqs) > 0)
						<div class="col-lg-6">
							<h2 class="mt-6 mb-1">{{ __('Frequently Asked Questions') }}</h2>
							<div id="accordion">
								@foreach($faqs as $index => $faq)
									<div class="card card-accordion">
										<a class="card-header {{ $index === 0 ? '' : 'collapsed' }}" 
										   href="#" 
										   data-toggle="collapse" 
										   data-target="#collapse{{ $faq['id'] }}"
										   aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" 
										   aria-controls="collapse{{ $faq['id'] }}">
											{{ $faq['question'] }}
										</a>
										<div id="collapse{{ $faq['id'] }}" 
											 class="collapse {{ $index === 0 ? 'show' : '' }}" 
											 data-parent="#accordion">
											<p>{{ $faq['answer'] }}</p>
										</div>
									</div>
								@endforeach
							</div>
						</div>
					@endif
				</div>
			</div>

			<div class="mb-8"></div>
@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
