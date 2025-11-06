@extends('layouts.porto')

@section('header')
    @include('components.porto.header')
@endsection

@section('content')
<div class="container">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="sidebar-wrapper sticky-sidebar" style="position: sticky; top: 20px;">
                                    <ul class="sidebar-menu">
                                        <li class="with-sf-arrow">
                                            <a href="#general" data-toggle="collapse">General</a>
                                            <ul class="sub-menu collapse show" style="overflow: hidden;" id="general">
                                                <li>
                                                    <a index="0" sub-index="0" href="#" class="active">Getting
                                                        Started</a>
                                                </li>
                                                <li>
                                                    <a index="0" sub-index="1" href="#" class="">Features</a>
                                                </li>
                                                <li>
                                                    <a index="0" sub-index="2" href="#" class="">Files Structure</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="with-sf-arrow"><a href="#style"
                                                data-toggle="collapse">Stylesheets</a>
                                            <ul class="sub-menu collapse" style="overflow: hidden;" id="style">
                                                <li>
                                                    <a index="1" sub-index="0" href="#">Helpers</a>
                                                </li>
                                                <li>
                                                    <a index="1" sub-index="1" href="#">Mixins</a>
                                                </li>
                                                <li>
                                                    <a index="1" sub-index="2" href="#">Configuration</a>
                                                </li>
                                                <li>
                                                    <a index="1" sub-index="3" href="#">Theme Variables</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="with-sf-arrow"><a href="#js" data-toggle="collapse">Javascripts</a>
                                            <ul class="sub-menu collapse" style="overflow: hidden;" id="js">
                                                <li><a index="2" sub-index="0" href="#">Overview</a></li>
                                            </ul>
                                        </li>
                                        <li class="with-sf-arrow"><a href="#components"
                                                data-toggle="collapse">Components</a>
                                            <ul class="sub-menu collapse" style="overflow: hidden;" id="components">
                                                <li>
                                                    <a index="3" sub-index="0" href="#">Alerts</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="1" href="#">Breadcrumb</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="2" href="#">Button</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="3" href="#">Card</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="4" href="#">Countdown</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="5" href="#">Counters</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="6" href="#">Feature Box</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="7" href="#">Info Box</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="8" href="#">Member</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="9" href="#">Page Header</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="10" href="#">Pagination</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="11" href="#">Popup</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="12" href="#">Product</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="13" href="#">Product
                                                        Category</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="14" href="#">Slider</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="15" href="#">Social Icons</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="16" href="#">Sticky Header</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="17" href="#">Store</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="18" href="#">Tabs</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="19" href="#">Testimonial</a>
                                                </li>
                                                <li>
                                                    <a index="3" sub-index="20" href="#">Word Rotate</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="sub-menu pl-0">
                                            <a index="4" sub-index="0" href="#">Thank you</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-9 content-wrapper">
                                <div class="document-content">
                                </div>
                            </div>
                        </div>
                    </div>
@endsection

@push('styles')
    {{-- Ekstra CSS dosyaları buraya eklenebilir --}}
@endpush

@push('scripts')
    {{-- Ekstra JavaScript dosyaları buraya eklenebilir --}}
@endpush
