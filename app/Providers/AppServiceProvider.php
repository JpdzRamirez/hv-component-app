<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\CountryServiceInterface;
use App\Contracts\StateServiceInterface;
use App\Contracts\CityServiceInterface;
use App\Contracts\CastServiceInterface;

use App\Services\LocationService;
use App\Services\CastService;

use App\Services\GeoLocationHandler;

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
        $this->app->bind(CastServiceInterface::class, CastService::class);
        //Geolocation Service
        $this->app->singleton(GeoLocationHandler::class, function ($app) {
            return new GeoLocationHandler();
        });
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
