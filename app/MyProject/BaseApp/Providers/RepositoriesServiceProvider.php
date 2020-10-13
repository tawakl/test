<?php

namespace App\MyProject\BaseApp\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            'App\MyProject\Categories\Repository\CategoryRepositoryInterface',
            'App\MyProject\Categories\Repository\CategoryRepository'
        );
    }
}
