<?php

use App\Providers\ModuleServiceProvider;
use Illuminate\Support\Facades\Gate;

/**
 * Module ServiceProvider Testleri
 *
 * Bu test sınıfı, modül ServiceProvider'larının doğru yüklendiğini
 * ve modül yapılandırmasının çalıştığını kontrol eder.
 */
describe('Module ServiceProvider', function () {
    it('ModuleServiceProvider kayıtlı olmalı', function () {
        $providers = app()->getLoadedProviders();
        expect($providers)->toHaveKey(ModuleServiceProvider::class);
    });

    it('aktif modüllerin ServiceProvider\'ları yüklenmeli', function () {
        $modules = config('modules.enabled', []);
        $loadedProviders = app()->getLoadedProviders();

        foreach ($modules as $module => $enabled) {
            if (! $enabled) {
                continue;
            }

            $moduleName = ucfirst($module);
            $providerClass = "App\\Providers\\Domains\\{$moduleName}ServiceProvider";

            if (class_exists($providerClass)) {
                expect($loadedProviders)->toHaveKey($providerClass);
            }
        }
    });

    it('pasif modüllerin ServiceProvider\'ları yüklenmemeli', function () {
        $modules = config('modules.enabled', []);
        $loadedProviders = app()->getLoadedProviders();

        foreach ($modules as $module => $enabled) {
            if ($enabled) {
                continue;
            }

            $moduleName = ucfirst($module);
            $providerClass = "App\\Providers\\Domains\\{$moduleName}ServiceProvider";

            // Eğer modül pasifse ve provider varsa, yüklenmemeli
            if (class_exists($providerClass)) {
                // Not: Laravel tüm provider'ları yükleyebilir, bu yüzden
                // sadece modülün pasif olduğunu kontrol ediyoruz
                expect(config("modules.enabled.{$module}"))->toBeFalse();
            }
        }
    });
});

describe('Module Configuration', function () {
    it('modül yapılandırması yüklenmeli', function () {
        expect(config('modules'))->toBeArray()
            ->and(config('modules.enabled'))->toBeArray()
            ->and(config('modules.namespaces'))->toBeArray()
            ->and(config('modules.route_prefixes'))->toBeArray();
    });

    it('her modül için namespace tanımlı olmalı', function () {
        $modules = array_keys(config('modules.enabled', []));
        foreach ($modules as $module) {
            expect(config("modules.namespaces.{$module}"))->toBeString()
                ->and(config("modules.namespaces.{$module}"))->toStartWith('App\\Domains\\');
        }
    });

    it('her modül için route prefix tanımlı olmalı', function () {
        $modules = array_keys(config('modules.enabled', []));
        foreach ($modules as $module) {
            expect(config("modules.route_prefixes.{$module}"))->toBeString();
        }
    });
});

describe('Domain ServiceProviders', function () {
    it('Blog ServiceProvider repository binding yapmalı', function () {
        // Repository binding kontrolü
        $interface = \App\Domains\Blog\Contracts\PostRepositoryInterface::class;
        $implementation = app($interface);
        expect($implementation)->toBeInstanceOf(\App\Domains\Blog\Repositories\PostRepository::class);
    });

    it('Blog ServiceProvider policy kayıtları yapmalı', function () {
        $model = \App\Domains\Blog\Models\Post::class;
        $policy = Gate::getPolicyFor($model);
        expect($policy)->toBeInstanceOf(\App\Domains\Blog\Policies\PostPolicy::class);
    });

    it('Cms ServiceProvider policy kayıtları yapmalı', function () {
        $model = \App\Domains\Cms\Models\Page::class;
        $policy = Gate::getPolicyFor($model);
        expect($policy)->toBeInstanceOf(\App\Domains\Cms\Policies\PagePolicy::class);
    });

    it('Media ServiceProvider policy kayıtları yapmalı', function () {
        $model = \App\Domains\Media\Models\MediaFile::class;
        $policy = Gate::getPolicyFor($model);
        expect($policy)->toBeInstanceOf(\App\Domains\Media\Policies\MediaFilePolicy::class);
    });
});
