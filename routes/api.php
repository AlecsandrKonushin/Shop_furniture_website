<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/categories')->name('category')->group(function () {
    Route::get('/withCount', \App\Http\Controllers\API\Category\WithCountController::class);
});
