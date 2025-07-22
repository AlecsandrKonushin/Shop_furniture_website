<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/categories')->group(function () {
    Route::get('/withCount', \App\Http\Controllers\API\Category\CategoriesWithCountController::class);
});

Route::prefix('/colors')->group(function () {
    Route::get('/', \App\Http\Controllers\API\Color\ColorsController::class);
});

Route::prefix('/products')->group(function () {
    Route::get('/', \App\Http\Controllers\API\Product\IndexController::class);
    Route::get('/metaProducts', \App\Http\Controllers\API\Product\MetaProductsController::class);
    Route::get('/{product}', \App\Http\Controllers\API\Product\ShowController::class);
});
