@extends('admin.layouts.app')

@section('title', 'Sayfa Düzenle')

@section('content')
    <livewire:cms.admin.page-form :id="$id" />
@endsection
