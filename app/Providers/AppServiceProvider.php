<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Repository bindings artık her modülün kendi ServiceProvider'ında yapılıyor
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Locale ayarını yap (validation mesajları için)
        App::setLocale(config('app.locale', 'tr'));

        // preventLazyLoading: Production'da da aktif (sadece warning, exception değil)
        if (config('app.prevent_lazy_loading', true)) {
            Model::preventLazyLoading(
                ! app()->isProduction() // Production'da exception değil, sadece warning
            );
        }

        // preventAccessingMissingAttributes: Sadece development'ta aktif
        // Production'da bu tür hatalar zaten test edilmiş olmalı
        if (! app()->isProduction()) {
            Model::preventAccessingMissingAttributes();
        }

        // preventSilentlyDiscardingAttributes: Her zaman aktif (güvenlik açısından kritik)
        // Mass assignment sırasında $fillable/$guarded dışındaki attribute'ların
        // sessizce atılmasını engeller - bu bir güvenlik açığı olabilir
        Model::preventSilentlyDiscardingAttributes();

        // Policies ve Event Listeners artık her modülün kendi ServiceProvider'ında yapılıyor
    }
}
