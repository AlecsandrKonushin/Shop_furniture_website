<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/categories')->group(function () {
    Route::get('/withCount', \App\Http\Controllers\API\Category\CategoriesWithCountController::class);
});

Route::prefix('/colors')->group(function () {
    Route::get('/', \App\Http\Controllers\API\Color\ColorsController::class);
});

Route::prefix('/products')->group(function () {
    Route::get('/', \App\Http\Controllers\API\Product\ProductsController::class);
});
