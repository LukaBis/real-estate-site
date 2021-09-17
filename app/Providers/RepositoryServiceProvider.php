<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\EloquentRepositoryInterface;
use App\Repositories\LanguageRepositoryInterface;
use App\Repositories\AgentRepositoryInterface;
use App\Repositories\PropertyRepositoryInterface;
use App\Repositories\AmenityRepositoryInterface;
use App\Repositories\TestemonialRepositoryInterface;
use App\Repositories\AboutRepositoryInterface;
use App\Repositories\StatusRepositoryInterface;
use App\Repositories\StatusTranslationRepositoryInterface;

use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Eloquent\LanguageRepository;
use App\Repositories\Eloquent\AgentRepository;
use App\Repositories\Eloquent\PropertyRepository;
use App\Repositories\Eloquent\AmenityRepository;
use App\Repositories\Eloquent\TestemonialRepository;
use App\Repositories\Eloquent\AboutRepository;
use App\Repositories\Eloquent\StatusRepository;
use App\Repositories\Eloquent\StatusTranslationRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(LanguageRepositoryInterface::class, LanguageRepository::class);
        $this->app->bind(AgentRepositoryInterface::class, AgentRepository::class);
        $this->app->bind(PropertyRepositoryInterface::class, PropertyRepository::class);
        $this->app->bind(AmenityRepositoryInterface::class, AmenityRepository::class);
        $this->app->bind(TestemonialRepositoryInterface::class, TestemonialRepository::class);
        $this->app->bind(AboutRepositoryInterface::class, AboutRepository::class);
        $this->app->bind(StatusRepositoryInterface::class, StatusRepository::class);
        $this->app->bind(StatusTranslationRepositoryInterface::class, StatusTranslationRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
