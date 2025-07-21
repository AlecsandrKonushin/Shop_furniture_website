<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/categories')->group(function () {
    Route::get('/withCount', \App\Http\Controllers\API\Category\WithCountController::class);
});

Route::prefix('/products')->group(function () {
    Route::get('/', \App\Http\Controllers\API\Product\CatalogProductsController::class);
});
