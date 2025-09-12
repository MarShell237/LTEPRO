<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    
        // Force Laravel à utiliser l'URL publique de ton tunnel
        URL::forceRootUrl(config('app.url'));

        // Si DevTunnels utilise HTTPS
        URL::forceScheme('https');
    }
}
