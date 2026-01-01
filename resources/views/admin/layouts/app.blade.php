<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>{{ isset($title) ? $title . ' - ' . config('app.name') : config('app.name') }} | Admin</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles

        {{-- TinyMCE for Rich Text Editor --}}
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

        {{-- Cropper.js for Image Library --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>

        {{-- Sortable.js for Image Library --}}
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.1/Sortable.min.js"></script>

        @stack('styles')
    </head>
    <body class="min-h-screen font-sans antialiased bg-base-200" x-data x-init="$store.theme.init()">
        {{-- NAVBAR mobile only --}}
        <x-nav sticky class="lg:hidden">
            <x-slot:brand>
                <a href="{{ route('admin.dashboard') }}" class="font-bold text-xl">
                    {{ config('app.name') }}
                </a>
            </x-slot>
            <x-slot:actions>
                <button type="button" @click="$store.theme.toggle()" class="btn btn-primary btn-circle btn-sm me-3 shadow-lg" title="Tema Değiştir">
                    <x-icon name="o-sun" x-show="$store.theme.current === 'light'" class="w-5 h-5" />
                    <x-icon name="o-moon" x-show="$store.theme.current === 'dark'" class="w-5 h-5" />
                </button>
                <label for="main-drawer" class="lg:hidden me-3">
                    <x-icon name="o-bars-3" class="cursor-pointer" />
                </label>
            </x-slot>
        </x-nav>

        {{-- MAIN --}}
        <x-main>
            {{-- SIDEBAR --}}
            <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">
                {{-- BRAND --}}
                <div class="px-5 pt-4 flex items-center justify-between">
                    <a href="{{ route('admin.dashboard') }}" class="font-bold text-xl">
                        {{ config('app.name') }}
                    </a>
                    <button type="button" @click="$store.theme.toggle()" class="btn btn-primary btn-circle btn-sm shadow-lg" title="Tema Değiştir">
                        <x-icon name="o-sun" x-show="$store.theme.current === 'light'" class="w-5 h-5" />
                        <x-icon name="o-moon" x-show="$store.theme.current === 'dark'" class="w-5 h-5" />
                    </button>
                </div>

                {{-- MENU --}}
                <x-menu activate-by-route>
                    {{-- User --}}
                    @if ($user = auth()->user())
                        <x-menu-separator />

                        <x-list-item :item="$user" value="name" sub-value="email" no-separator no-hover class="-mx-2 !-my-2 rounded">
                            <x-slot:actions>
                                <x-button icon="o-power" class="btn-circle btn-ghost btn-xs" tooltip-left="Çıkış Yap" link="{{ route('logout') }}" />
                            </x-slot>
                        </x-list-item>

                        <x-menu-item title="Profil" icon="o-user" link="{{ route('admin.profile') }}" />

                        <x-menu-separator />
                    @endif

                    <x-menu-item title="Dashboard" icon="o-home" link="{{ route('admin.dashboard') }}" />

                    @if (config('modules.enabled.blog', true))
                        <x-menu-sub title="Blog" icon="o-document-text">
                            <x-menu-item title="Yazılar" icon="o-document" link="{{ route('admin.blog.posts.index') }}" />
                            <x-menu-item title="Kategoriler" icon="o-folder" link="{{ route('admin.blog.categories.index') }}" />
                        </x-menu-sub>
                    @endif

                    @if (config('modules.enabled.cms', true))
                        <x-menu-sub title="CMS" icon="o-document-duplicate">
                            <x-menu-item title="Sayfalar" icon="o-document" link="{{ route('admin.cms.pages.index') }}" />
                            {{-- <x-menu-item title="Slider'lar" icon="o-photo" link="#" /> --}}
                        </x-menu-sub>
                    @endif

                    @if (config('modules.enabled.crm', true))
                        <x-menu-item title="Kullanıcılar" icon="o-users" link="{{ route('admin.crm.users.index') }}" />
                    @endif

                    @if (config('modules.enabled.settings', true))
                        <x-menu-item title="Ayarlar" icon="o-cog-6-tooth" link="{{ route('admin.settings.index') }}" />
                    @endif

                    <x-menu-item title="Components" icon="o-squares-2x2" link="{{ route('admin.components') }}" />
                </x-menu>
            </x-slot>

            {{-- The `$slot` goes here (for Livewire components) or @yield('content') for Blade views --}}
            <x-slot:content>
                {{ $slot ?? '' }}
                @yield('content')
            </x-slot>
        </x-main>

        {{-- TOAST area --}}
        <x-toast />

        @livewireScripts
        @stack('scripts')
    </body>
</html>
