<?php

namespace TendoPay\LazadaApi\Providers;

use Illuminate\Support\ServiceProvider;

class LazadaServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/lazada.php' => config_path('lazada.php'),
        ], 'config');

        $this->mergeConfigFrom(
            __DIR__ . '/../config/lazada.php', 'lazada'
        );
    }

    public function register()
    {
    }
}
