<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

Auth::routes();

/*HOME ROUTE FOR NORMAL USER*/
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['is_user', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function() {
    Route::get('/', [HomeController::class, 'index'])->name('home');
});

/*ADMIN ROUTES*/
Route::group(['middleware' => 'is_admin'], function() {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');

    /*users routes*/
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    /*products routes*/
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});
