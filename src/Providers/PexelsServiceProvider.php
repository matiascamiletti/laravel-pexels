<?php

namespace MC\Pexels\Providers;

use Illuminate\Support\ServiceProvider;
use MC\Pexels\Services\MCPexelsService;

class PexelsServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(MCPexelsService::class, function ($app) {
            return new MCPexelsService(config('pexels'));
        });
    }
}
