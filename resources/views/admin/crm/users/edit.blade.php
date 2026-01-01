@extends('admin.layouts.app')

@section('title', 'Kullanıcı Düzenle')

@section('content')
    <livewire:crm.admin.user-form :id="$id" />
@endsection
