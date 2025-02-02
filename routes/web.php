<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminComponentController;
use App\Http\Controllers\Admin\AdminExampleController;
use App\Http\Controllers\Admin\AdminIconController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/'], function () {
    // URL: / | Имя маршрута: home
    Route::get('/', [HomeController::class, 'index'])
        ->name('home');

    // URL: /about | Имя маршрута: about
    Route::get('about', [AboutController::class, 'index'])
        ->name('about');

    // URL: /contact | Имя маршрута: contact
    Route::get('contact', [ContactController::class, 'index'])
        ->name('contact');

    // URL: /components | Имя маршрута: components
    Route::get('components', [ComponentController::class, 'index'])
        ->name('components');

    // URL: /components/{category}/ | Имя маршрута: showComponent

    Route::get('components/{category}/', [ComponentController::class, 'show'])
        ->name('components.category');

    // URL: /examples/laravel | Имя маршрута: laravel
    Route::get('examples/laravel', [ExampleController::class, 'index'])
        ->name('laravel');

    // URL: /examples/{category}/{example} | Имя маршрута: showExample
    Route::get('examples/{category}/{example}', [ExampleController::class, 'show'])
        ->name('showExample');
});

Route::middleware([AdminMiddleware::class])
    ->prefix('admin')
    ->as('admin.')
    ->group(function () {

        // URL: /admin/dashboard | Имя маршрута: admin.dashboard
        Route::get('dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        // URL: /admin/categories | Имя маршрута: admin.categories.index
        Route::resource('categories', AdminCategoryController::class)
            ->except(['show']);

        Route::get('/categories/{category}', [AdminCategoryController::class, 'show'])
            ->name('categories.show');

        // URL: /admin/components | Имя маршрута: admin.components.index
        Route::resource('components', AdminComponentController::class)
            ->except(['show']);

        Route::get('/component/{component}', [AdminComponentController::class, 'show'])
            ->name('components.show');

        // URL: /admin/components | Имя маршрута: admin.components.index
        Route::resource('icons', AdminIconController::class)
            ->except(['show']);

        Route::get('/icons/{icons}', [AdminIconController::class, 'show'])
            ->name('icons.show');

        // URL: /admin/examples | Имя маршрута: admin.examples.index
        Route::resource('examples', AdminExampleController::class)
            ->except(['show']);
        // URL: /admin/logout | Имя маршрута: admin.logout
        Route::post('/admin/logout', [LoginController::class, 'destroy'])
            ->name('logout');
    });

Route::as('admin.')
    ->prefix('admin')
    ->group(function () {
        // URL: /admin/login | Имя маршрута: admin.login
        Route::get('/login', [LoginController::class, 'index'])
            ->name('login');

        // URL: /admin/login | Имя маршрута: admin.login.store
        Route::post('/login', [LoginController::class, 'store'])
            ->name('login.store');

        // URL: /admin/create-user | Имя маршрута: admin.createUser
        Route::get('/create-user', [LoginController::class, 'createTestAdmin'])
            ->name('createUser');
    });

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
