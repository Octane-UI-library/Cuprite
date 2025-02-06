<?php

namespace App\Providers;

use App\Services\CategoryService;
use App\Services\ComponentService;
use App\Services\IconService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind('iconService', function () {
            return new IconService;
        });

        $this->app->bind('categoryService', function () {
            return new CategoryService;
        });

        $this->app->bind('componentService', function () {
            return new ComponentService;
        });
    }

    public function boot(): void
    {
        //
    }
}
