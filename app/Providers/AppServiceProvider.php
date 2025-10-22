<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
        // if(config('app.env') == 'production')
        // {
        //     // 🔹 Detectar correctamente HTTPS detrás del proxy de HostGator
        //     if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
        //         $this->app['request']->server->set('HTTPS', true);
        //     }
    
        //     // 🔹 Forzar siempre HTTPS
        //     URL::forceScheme('https');
        // }

        
    }
}
