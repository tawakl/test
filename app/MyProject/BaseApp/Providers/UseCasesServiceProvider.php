<?php

namespace App\MyProject\BaseApp\Providers;

use App\MyProject\Categories\UseCases\CategoryUseCase\CategoryUseCase;
use App\MyProject\Categories\UseCases\CategoryUseCase\CategoryUseCaseInterface;
use App\MyProject\Products\UseCases\ProductUseCase\ProductUseCase;
use App\MyProject\Products\UseCases\ProductUseCase\ProductUseCaseInterface;
use Illuminate\Support\ServiceProvider;


class UseCasesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            CategoryUseCaseInterface::class,
            CategoryUseCase::class
        );
        $this->app->bind(
            ProductUseCaseInterface::class,
            ProductUseCase::class
        );
    }
}
