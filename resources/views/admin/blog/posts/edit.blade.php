@extends('admin.layouts.app')

@section('title', 'Yazı Düzenle')

@section('content')
    <livewire:blog.admin.post-form :id="$id" />
@endsection
