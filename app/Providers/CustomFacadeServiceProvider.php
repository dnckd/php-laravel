<?php

declare(strict_types=1);

namespace App\Providers;

use App\CustomFacade\MultiFactorAuthentication\MultiFactorAuthenticationFacade;
use Illuminate\Support\ServiceProvider;

class CustomFacadeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('mfa', function () {
            return new MultiFactorAuthenticationFacade();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
