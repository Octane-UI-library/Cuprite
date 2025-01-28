<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminComponentController;
use App\Http\Controllers\Admin\AdminExampleController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/'], function () {

    // URL: / | Имя маршрута: home
    Route::get('/', [HomeController::class, 'index'])
        ->name('home');

    // URL: /about | Имя маршрута: about
    Route::get('about', [AboutController::class, 'index'])
        ->name('about');

    // URL: /components | Имя маршрута: components
    Route::get('components', [ComponentController::class, 'index'])
        ->name('components');

    // URL: /components/{category}/{component} | Имя маршрута: showComponent
    Route::get('components/{category}/{component}', [ComponentController::class, 'show'])
        ->name('showComponent');

    // URL: /contact | Имя маршрута: contact
    Route::get('contact', [ContactController::class, 'index'])
        ->name('contact');

    // URL: /examples/laravel | Имя маршрута: laravel
    Route::get('examples/laravel', [ExampleController::class, 'index'])
        ->name('laravel');

    // URL: /examples/{category}/{example} | Имя маршрута: showExample
    Route::get('examples/{category}/{example}', [ExampleController::class, 'show'])
        ->name('showExample');

});

Route::group(['prefix' => 'categories'], function () {

    // URL: /categories | Имя маршрута: categories.index
    Route::get('/', [CategoryController::class, 'index'])
        ->name('categories.index');

    // URL: /categories/{category} | Имя маршрута: categories.show
    Route::get('/{category}', [CategoryController::class, 'show'])
        ->name('categories.show');

});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    // URL: /admin/dashboard | Имя маршрута: admin.dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // URL: /admin/components | Имя маршрута: admin.components.index
    Route::resource('components', AdminComponentController::class)
        ->except(['show']);

    // URL: /admin/components/{component}/publish | Имя маршрута: admin.components.publish
    Route::post('components/{component}/publish', [AdminComponentController::class, 'publish'])
        ->name('components.publish');

    // URL: /admin/components/{component}/archive | Имя маршрута: admin.components.archive
    Route::post('components/{component}/archive', [AdminComponentController::class, 'archive'])
        ->name('components.archive');

    // URL: /admin/examples | Имя маршрута: admin.examples.index
    Route::resource('examples', AdminExampleController::class)
        ->except(['show']);

    // URL: /admin/examples/{example}/publish | Имя маршрута: admin.examples.publish
    Route::post('examples/{example}/publish', [AdminExampleController::class, 'publish'])
        ->name('examples.publish');

    // URL: /admin/examples/{example}/archive | Имя маршрута: admin.examples.archive
    Route::post('examples/{example}/archive', [AdminExampleController::class, 'archive'])
        ->name('examples.archive');

})->middleware(AdminMiddleware::class);

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
