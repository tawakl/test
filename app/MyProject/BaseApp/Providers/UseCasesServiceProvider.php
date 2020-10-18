<?php

namespace App\MyProject\BaseApp\Providers;

use App\MyProject\Categories\UseCases\CategoryUseCase\CategoryUseCase;
use App\MyProject\Categories\UseCases\CategoryUseCase\CategoryUseCaseInterface;
use Illuminate\Support\ServiceProvider;


class UseCasesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            CategoryUseCaseInterface::class,
            CategoryUseCase::class
        );
    }
}
