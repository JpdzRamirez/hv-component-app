<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\CountryServiceInterface;
use App\Contracts\StateServiceInterface;
use App\Contracts\CityServiceInterface;
use App\Services\LocationService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        // Registrar las interfaces con su implementación
        $this->app->bind(CountryServiceInterface::class, LocationService::class);
        $this->app->bind(StateServiceInterface::class, LocationService::class);
        $this->app->bind(CityServiceInterface::class, LocationService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
