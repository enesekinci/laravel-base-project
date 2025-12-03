<?php

use Illuminate\Support\Facades\Config;

/**
 * Environment Variable Testleri
 *
 * Bu test sınıfı, tüm environment variable'ların doğru yüklendiğini
 * ve config dosyalarında eksik değişken olmadığını kontrol eder.
 */
describe('Environment Variables', function () {
    it('uygulama temel ayarlarını yükler', function () {
        expect(config('app.name'))->not->toBeEmpty()
            ->and(config('app.env'))->toBeString()
            ->and(config('app.url'))->toBeString()
            ->and(config('app.debug'))->toBeBool();
    });

    it('veritabanı bağlantı ayarlarını yükler', function () {
        $default = config('database.default');
        expect($default)->toBeString()
            ->and(config('database.connections.' . $default))->toBeArray();

        // SQLite için host yok, diğerleri için kontrol et
        if ($default !== 'sqlite') {
            expect(config('database.connections.' . $default . '.host'))->toBeString();
        }
    });

    it('Redis bağlantı ayarlarını yükler', function () {
        expect(config('database.redis.client'))->toBeString()
            ->and(config('database.redis.default'))->toBeArray()
            ->and(config('database.redis.cache'))->toBeArray();
    });

    it('cache ayarlarını yükler', function () {
        expect(config('cache.default'))->toBeString()
            ->and(config('cache.stores.' . config('cache.default')))->toBeArray();
    });

    it('session ayarlarını yükler', function () {
        expect(config('session.driver'))->toBeString()
            ->and(config('session.lifetime'))->toBeInt()
            ->and(config('session.lifetime'))->toBeGreaterThan(0);
    });

    it('queue ayarlarını yükler', function () {
        expect(config('queue.default'))->toBeString()
            ->and(config('queue.connections.' . config('queue.default')))->toBeArray();
    });

    it('mail ayarlarını yükler', function () {
        expect(config('mail.default'))->toBeString()
            ->and(config('mail.mailers.' . config('mail.default')))->toBeArray();
    });

    it('modül ayarlarını yükler', function () {
        expect(config('modules.enabled'))->toBeArray()
            ->and(config('modules.enabled.auth'))->toBeBool()
            ->and(config('modules.enabled.blog'))->toBeBool()
            ->and(config('modules.enabled.cms'))->toBeBool();
    });

    it('Octane ayarlarını yükler', function () {
        expect(config('octane.server'))->toBeString()
            ->and(in_array(config('octane.server'), ['roadrunner', 'swoole', 'frankenphp']))->toBeTrue();
    });

    it('locale ayarlarını yükler', function () {
        expect(config('app.locale'))->toBeString()
            ->and(config('app.fallback_locale'))->toBeString()
            ->and(config('app.faker_locale'))->toBeString();
    });
});

describe('Environment Variable Defaults', function () {
    it('session driver Redis olmalı (Octane için önerilen)', function () {
        // Octane + FrankenPHP kullanıldığında session driver Redis olmalı
        // Test ortamında farklı olabilir, bu yüzden sadece kontrol ediyoruz
        $driver = config('session.driver');
        expect($driver)->toBeString();
        // Production'da Redis olmalı
        if (config('app.env') === 'production') {
            expect($driver)->toBe('redis');
        }
    });

    it('cache store Redis olmalı (performans için)', function () {
        // Test ortamında farklı olabilir
        $store = config('cache.default');
        expect($store)->toBeString();
        // Production'da Redis olmalı
        if (config('app.env') === 'production') {
            expect($store)->toBe('redis');
        }
    });

    it('queue connection database veya redis olmalı', function () {
        $queueConnection = config('queue.default');
        expect(in_array($queueConnection, ['database', 'redis', 'sync']))->toBeTrue();
    });
});

describe('Redis Configuration', function () {
    it('Redis default connection ayarları mevcut olmalı', function () {
        $redis = config('database.redis.default');
        expect($redis)->toBeArray()
            ->and($redis['host'])->toBeString()
            ->and((int) $redis['port'])->toBeGreaterThan(0);
    });

    it('Redis cache connection ayarları mevcut olmalı', function () {
        $redis = config('database.redis.cache');
        expect($redis)->toBeArray()
            ->and($redis['host'])->toBeString()
            ->and((int) $redis['port'])->toBeGreaterThan(0);
    });

    it('Redis default ve cache farklı database kullanmalı', function () {
        $defaultDb = config('database.redis.default.database', 0);
        $cacheDb = config('database.redis.cache.database', 1);
        expect($defaultDb)->not->toBe($cacheDb);
    });
});

describe('Module Configuration', function () {
    it('tüm modüller enabled/disabled durumuna sahip olmalı', function () {
        $modules = ['auth', 'blog', 'cms', 'crm', 'media', 'settings'];
        foreach ($modules as $module) {
            expect(config("modules.enabled.{$module}"))->toBeBool();
        }
    });

    it('modül namespace\'leri tanımlı olmalı', function () {
        $modules = ['auth', 'blog', 'cms', 'crm', 'media', 'settings'];
        foreach ($modules as $module) {
            expect(config("modules.namespaces.{$module}"))->toBeString()
                ->and(config("modules.namespaces.{$module}"))->toStartWith('App\\Domains\\');
        }
    });
});
