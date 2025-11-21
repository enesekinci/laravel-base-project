@extends('layouts.porto')

@section('header')
    @include('porto.demo1.header')
@endsection

@section('content')
<nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('page', ['page' => 'index']) }}"><i class="icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ __('Contact Us') }}
                        </li>
                    </ol>
                </div>
            </nav>

            <div id="map"></div>

            <div class="container contact-us-container">
                <div class="contact-info">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="ls-n-25 m-b-1">
                                {{ __('Contact Info') }}
                            </h2>

                            <p>
                                {{ $contactDescription ?? __('Reach out to us for any questions that will take the customer experience to the next level.') }}
                            </p>
                        </div>

                        @forelse($contactInfoBoxes as $box)
                            <div class="col-sm-6 col-lg-3">
                                <div class="feature-box text-center">
                                    @if(!empty($box['icon']))
                                        <i class="{{ $box['icon'] }}"></i>
                                    @endif
                                    <div class="feature-box-content">
                                        <h3>{{ $box['title'] ?? '' }}</h3>
                                        <h5>{{ $box['description'] ?? $box['subtitle'] ?? '' }}</h5>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-light border text-center mb-0">
                                    {{ __('You can add contact information from the admin panel.') }}
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <h2 class="mt-6 mb-2">{{ __('Send Us a Message') }}</h2>

                        <form class="mb-0" action="#">
                            <div class="form-group">
                                <label class="mb-1" for="contact-name">{{ __('Your Name') }}
                                    <span class="required">*</span></label>
                                <input type="text" class="form-control" id="contact-name" name="contact-name"
                                    required />
                            </div>

                            <div class="form-group">
                                <label class="mb-1" for="contact-email">{{ __('Your E-mail') }}
                                    <span class="required">*</span></label>
                                <input type="email" class="form-control" id="contact-email" name="contact-email"
                                    required />
                            </div>

                            <div class="form-group">
                                <label class="mb-1" for="contact-message">{{ __('Your Message') }}
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

                    <div class="col-lg-6">
                        <h2 class="mt-6 mb-1">{{ __('Frequently Asked Questions') }}</h2>
                        <div id="accordion">
                            @forelse($faqs ?? [] as $index => $faq)
                                <div class="card card-accordion">
                                    <a class="card-header collapsed" href="#" data-toggle="collapse"
                                        data-target="#collapse{{ $index }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                                        {{ $faq['question'] ?? '' }}
                                    </a>

                                    <div id="collapse{{ $index }}" class="collapse {{ $loop->first ? 'show' : '' }}" data-parent="#accordion">
                                        <p>{{ $faq['answer'] ?? '' }}</p>
                                    </div>
                                </div>
                            @empty
                                <p class="text-muted">{{ __('No FAQ records found yet.') }}</p>
                            @endforelse
                        </div>
                    </div>
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
