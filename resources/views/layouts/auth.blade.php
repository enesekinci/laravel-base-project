<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>{{ isset($title) ? $title . ' - ' . config('app.name') : config('app.name') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
        @stack('styles')
    </head>
    <body class="min-h-screen font-sans antialiased bg-base-200" x-data x-init="$store.theme.init()">
        {{-- Theme Toggle Button --}}
        <div class="fixed top-4 right-4 z-50">
            <button type="button" @click="$store.theme.toggle()" class="btn btn-primary btn-circle btn-sm shadow-lg" title="Tema Değiştir">
                <x-icon name="o-sun" x-show="$store.theme.current === 'light'" class="w-5 h-5" />
                <x-icon name="o-moon" x-show="$store.theme.current === 'dark'" class="w-5 h-5" />
            </button>
        </div>

        @yield('content')

        @livewireScripts

        {{-- MaryUI Toast Component - LivewireScripts'ten sonra eklenmeli --}}
        <x-toast />

        @stack('scripts')
    </body>
</html>
