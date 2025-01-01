<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Contracts\ExperienceRepositoryInterface;
use App\Contracts\PresentationRepositoryInterface;
use App\Contracts\SkillRepositoryInterface;
use App\Contracts\SocialMediaRepositoryInterface;

use App\Contracts\CountryServiceInterface;
use App\Contracts\StateServiceInterface;
use App\Contracts\CityServiceInterface;
use App\Contracts\CastServiceInterface;

use App\Services\LocationService;
use App\Services\CastService;

use App\Repositories\PresentationRepository;
use App\Repositories\SkillRepository;
use App\Repositories\SocialMediaRepository;
use App\Repositories\ExperienceRepository;

use Illuminate\Support\Facades\URL;

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
        //Builder Interfaces
        $this->app->bind(PresentationRepositoryInterface::class, PresentationRepository::class);
        $this->app->bind(SkillRepositoryInterface::class, SkillRepository::class);
        $this->app->bind(SocialMediaRepositoryInterface::class, SocialMediaRepository::class);
        $this->app->bind(ExperienceRepositoryInterface::class, ExperienceRepository::class);
        //Form API Interfaces
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
        if (env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }
    }
}
