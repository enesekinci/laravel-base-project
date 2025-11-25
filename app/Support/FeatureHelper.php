<?php

namespace App\Support;

class FeatureHelper
{
    /**
     * Check if a feature is enabled
     */
    public static function enabled(string $feature): bool
    {
        return config("features.{$feature}", false);
    }

    /**
     * Check if a feature is disabled
     */
    public static function disabled(string $feature): bool
    {
        return ! self::enabled($feature);
    }
}
