<?php

/**
 * Config Validation Testleri
 *
 * Bu test sınıfı, config dosyalarındaki değerlerin geçerli olduğunu
 * ve uygulamanın çalışması için gerekli tüm ayarların mevcut olduğunu kontrol eder.
 */
describe('Config Validation', function () {
    it('app config geçerli değerlere sahip olmalı', function () {
        expect(config('app.name'))->not->toBeEmpty()
            ->and(config('app.env'))->toBeIn(['local', 'development', 'staging', 'production', 'testing'])
            ->and(config('app.url'))->toMatch('/^https?:\/\//');
    });

    it('database connection geçerli driver kullanmalı', function () {
        $validDrivers = ['mysql', 'pgsql', 'sqlite', 'sqlsrv', 'mariadb'];
        expect(config('database.default'))->toBeIn($validDrivers);
    });

    it('session driver geçerli driver kullanmalı', function () {
        $validDrivers = ['file', 'cookie', 'database', 'memcached', 'redis', 'dynamodb', 'array'];
        expect(config('session.driver'))->toBeIn($validDrivers);
    });

    it('cache store geçerli store kullanmalı', function () {
        $validStores = ['array', 'database', 'file', 'memcached', 'redis', 'dynamodb', 'octane', 'null'];
        expect(config('cache.default'))->toBeIn($validStores);
    });

    it('queue connection geçerli connection kullanmalı', function () {
        $validConnections = ['sync', 'database', 'beanstalkd', 'sqs', 'redis', 'deferred', 'background', 'failover', 'null'];
        expect(config('queue.default'))->toBeIn($validConnections);
    });

    it('mail mailer geçerli mailer kullanmalı', function () {
        $validMailers = ['smtp', 'sendmail', 'mailgun', 'ses', 'postmark', 'resend', 'log', 'array', 'failover'];
        expect(config('mail.default'))->toBeIn($validMailers);
    });

    it('Octane server geçerli server kullanmalı', function () {
        $validServers = ['roadrunner', 'swoole', 'frankenphp'];
        expect(config('octane.server'))->toBeIn($validServers);
    });
});

describe('Required Config Values', function () {
    it('app key tanımlı olmalı (production için kritik)', function () {
        // Test ortamında key olmayabilir, ama production'da olmalı
        if (config('app.env') === 'production') {
            expect(config('app.key'))->not->toBeEmpty();
        }
    });

    it('database connection bilgileri eksiksiz olmalı', function () {
        $connection = config('database.connections.' . config('database.default'));
        expect($connection)->toBeArray();

        // SQLite için host yok, diğerleri için host var
        if (config('database.default') !== 'sqlite') {
            expect($connection['host'] ?? null)->not->toBeEmpty();
        }

        // Database adı veya path olmalı
        expect($connection['database'] ?? null)->not->toBeEmpty();
    });

    it('Redis connection bilgileri eksiksiz olmalı', function () {
        $redis = config('database.redis.default');
        expect($redis)->toBeArray()
            ->and($redis['host'])->not->toBeEmpty()
            ->and((int) $redis['port'])->toBeGreaterThan(0);
    });
});

describe('Performance Configuration', function () {
    it('lazy loading prevention aktif olmalı (production için)', function () {
        // Production'da lazy loading prevention aktif olmalı
        if (config('app.env') === 'production') {
            expect(config('app.prevent_lazy_loading'))->toBeTrue();
        }
    });

    it('Redis persistent connection aktif olmalı (Octane için)', function () {
        expect(config('database.redis.options.persistent'))->toBeTrue();
    });
});
