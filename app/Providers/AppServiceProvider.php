<?php

namespace App\Providers;

use App\Contracts\CategoryServiceContract;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\EloquentCategory;
use App\Services\CategoryService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CategoryRepository::class, EloquentCategory::class);

        $this->app->singleton(CategoryServiceContract::class, CategoryService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
