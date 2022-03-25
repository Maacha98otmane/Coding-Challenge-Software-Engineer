<?php

namespace App\Providers;

use App\Contracts\CategoryServiceContract;
use App\Contracts\ImageServiceContract;
use App\Contracts\ProductServiceContract;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\EloquentCategory;
use App\Repositories\Product\EloquentProduct;
use App\Repositories\Product\ProductRepository;
use App\Services\CategoryService;
use App\Services\ImageService;
use App\Services\ProductService;
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
        $this->app->singleton(ProductRepository::class, EloquentProduct::class);
        $this->app->singleton(CategoryRepository::class, EloquentCategory::class);

        $this->app->singleton(CategoryServiceContract::class, CategoryService::class);
        $this->app->singleton(ProductServiceContract::class, ProductService::class);

        $this->app->singleton(ImageServiceContract::class, ImageService::class);
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
