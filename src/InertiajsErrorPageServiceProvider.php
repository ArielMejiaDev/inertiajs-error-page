<?php

namespace ArielMejiaDev\InertiajsErrorPage;

use Illuminate\Support\ServiceProvider;

class InertiajsErrorPageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {

        $this->publishes([
            __DIR__.'/publish/error' => resource_path('js/Pages/Errors'),
            __DIR__.'/publish/svg' => public_path('svg'),
        ], 'inertiajs-errors');

    }
}
