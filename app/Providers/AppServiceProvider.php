<?php

namespace App\Providers;

use App\Services\Search\CachedSearchService;
use App\Services\Search\SearchServiceInterface;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(SearchServiceInterface::class,CachedSearchService::class);
    }
}
