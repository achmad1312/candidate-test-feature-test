<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\ProjectRepositoryInterface;
use App\Repositories\Eloquent\ProjectRepository;
use App\Services\ProjectServiceInterface;
use App\Services\ProjectService;

use App\Repositories\Interfaces\BuildingPartRepositoryInterface;
use App\Repositories\BuildingPartRepository;
use App\Services\BuildingPartServiceInterface;
use App\Services\BuildingPartService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProjectRepositoryInterface::class, ProjectRepository::class);
        $this->app->bind(ProjectServiceInterface::class, ProjectService::class);
        $this->app->bind(BuildingPartRepositoryInterface::class, BuildingPartRepository::class);
        $this->app->bind(BuildingPartServiceInterface::class, BuildingPartService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
