<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->registerModuleProviders();
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Modül ServiceProvider'larını kaydet
     */
    protected function registerModuleProviders(): void
    {
        $modules = config('modules.enabled', []);

        foreach ($modules as $module => $enabled) {
            if (! $enabled) {
                continue;
            }

            $moduleName = $this->getModuleName($module);
            $providerClass = "App\\Providers\\Domains\\{$moduleName}ServiceProvider";

            if (class_exists($providerClass)) {
                $this->app->register($providerClass);
            }
        }
    }

    /**
     * Modül adını formatla (Auth, Blog, Cms, etc.)
     */
    protected function getModuleName(string $module): string
    {
        return ucfirst($module);
    }
}
