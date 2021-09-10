<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\EloquentRepositoryInterface;
use App\Repositories\LanguageRepositoryInterface;
use App\Repositories\AgentRepositoryInterface;

use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Eloquent\LanguageRepository;
use App\Repositories\Eloquent\AgentRepository;

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
