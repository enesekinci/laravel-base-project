@extends('layouts.porto')

@section('title', $page['meta_title'] ?? $page['title'])

@section('meta')
    <meta name="description" content="{{ $page['meta_description'] ?? '' }}">
@endsection

@section('content')
    <main class="main">
        <div class="page-header">
            <div class="container">
                <h1 class="page-title">{{ $page['title'] }}</h1>
            </div>
        </div>

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="entry-content">
                            {!! $page['content'] !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

