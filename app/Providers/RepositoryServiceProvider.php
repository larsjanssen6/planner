<?php

namespace App\Providers;

use App\Repositories\Category\CategoryRepo;
use App\Repositories\Category\CategoryRepoInterface;
use App\Repositories\Group\GroupRepo;
use App\Repositories\Group\GroupRepoInterface;
use App\Repositories\Peleton\PeletonRepo;
use App\Repositories\Peleton\PeletonRepoInterface;
use App\Repositories\Role\RoleRepo;
use App\Repositories\Role\RoleRepoInterface;
use App\Repositories\User\UserRepo;
use App\Repositories\User\UserRepoInterface;
use App\Repositories\Vehicle\VehicleRepo;
use App\Repositories\Vehicle\VehicleRepoInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Education\EducationRepo;
use App\Repositories\Education\EducationRepoInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(EducationRepoInterface::class, EducationRepo::class);
        $this->app->singleton(VehicleRepoInterface::class, VehicleRepo::class);
        $this->app->singleton(PeletonRepoInterface::class, PeletonRepo::class);
        $this->app->singleton(GroupRepoInterface::class, GroupRepo::class);
        $this->app->singleton(UserRepoInterface::class, UserRepo::class);
        $this->app->singleton(RoleRepoInterface::class, RoleRepo::class);
        $this->app->singleton(CategoryRepoInterface::class, CategoryRepo::class);
    }
}
