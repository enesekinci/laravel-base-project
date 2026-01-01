@extends('layouts.auth')

@section('title', 'Şifre Sıfırla')

@section('content')
    <livewire:auth.reset-password-form :token="$token" :email="$email" />
@endsection