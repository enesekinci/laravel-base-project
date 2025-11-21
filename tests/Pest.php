<?php

uses(
    Tests\TestCase::class,
    Illuminate\Foundation\Testing\RefreshDatabase::class
)->in('Feature', 'Unit');

// Test ortamında Scout driver'ı null yap (Meili çalışmıyorsa)
uses()->beforeEach(function () {
    if (config('scout.driver') === 'meilisearch') {
        // Meili çalışmıyorsa null driver kullan
        try {
            $client = app(\Meilisearch\Client::class);
            $client->health();
        } catch (\Exception $e) {
            config(['scout.driver' => 'null']);
        }
    }
})->in('Feature', 'Unit');
