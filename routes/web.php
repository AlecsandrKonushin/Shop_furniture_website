<?php

use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::prefix('/admin')->name('admin.')->middleware('auth')->group(function () {

    Route::get('/', \App\Http\Controllers\Main\IndexController::class)->name('main.index');

//    Route::prefix('/login')->name('login.')->group(function () {
//        Route::get('/', \App\Http\Controllers\Login\IndexController::class)->name('index');
//    });

    Route::prefix('/products')->name('product.')->group(function () {
        Route::get('/', \App\Http\Controllers\Product\IndexController::class)->name('index');
        Route::get('/create', \App\Http\Controllers\Product\CreateController::class)->name('create');
        Route::post('/', \App\Http\Controllers\Product\StoreController::class)->name('store');
        Route::get('/{product}', \App\Http\Controllers\Product\ShowController::class)->name('show');
        Route::get('/{product}/edit', \App\Http\Controllers\Product\EditController::class)->name('edit');
        Route::patch('/{product}', \App\Http\Controllers\Product\UpdateController::class)->name('update');
        Route::get('/{product}/confirm-delete', \App\Http\Controllers\Product\ConfirmDeleteController::class)->name('confirm.delete');
        Route::delete('/{product}', \App\Http\Controllers\Product\DeleteController::class)->name('delete');
    });

    Route::prefix('/categories')->name('category.')->group(function () {
        Route::get('/', \App\Http\Controllers\Category\IndexController::class)->name('index');
        Route::get('/create', \App\Http\Controllers\Category\CreateController::class)->name('create');
        Route::post('/', \App\Http\Controllers\Category\StoreController::class)->name('store');
        Route::get('/{category}', \App\Http\Controllers\Category\ShowController::class)->name('show');
        Route::get('/{category}/edit', \App\Http\Controllers\Category\EditController::class)->name('edit');
        Route::patch('/{category}', \App\Http\Controllers\Category\UpdateController::class)->name('update');
        Route::get('/{category}/confirm-delete', \App\Http\Controllers\Category\ConfirmDeleteController::class)->name('confirm.delete');
        Route::delete('/{category}', \App\Http\Controllers\Category\DeleteController::class)->name('delete');
    });

    Route::prefix('/colors')->name('color.')->group(function () {
        Route::get('/', \App\Http\Controllers\Color\IndexController::class)->name('index');
        Route::get('/create', \App\Http\Controllers\Color\CreateController::class)->name('create');
        Route::post('/', \App\Http\Controllers\Color\StoreController::class)->name('store');
        Route::get('/{color}', \App\Http\Controllers\Color\ShowController::class)->name('show');
        Route::get('/{color}/edit', \App\Http\Controllers\Color\EditController::class)->name('edit');
        Route::patch('/{color}', \App\Http\Controllers\Color\UpdateController::class)->name('update');
        Route::get('/{color}/confirm-delete', \App\Http\Controllers\Color\ConfirmDeleteController::class)->name('confirm.delete');
        Route::delete('/{color}', \App\Http\Controllers\Color\DeleteController::class)->name('delete');
    });

    Route::prefix('/website')->name('website.')->group(function () {
        Route::get('/', \App\Http\Controllers\Website\IndexController::class)->name('index');
    });
});
