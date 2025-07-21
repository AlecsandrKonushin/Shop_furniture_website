<?php

namespace App\Http\Controllers\API\Category;

use App\Http\Controllers\Controller;
use App\Http\Resources\Category\CategoryWithCountResource;
use App\Models\Category;

class WithCountController extends Controller
{
    public function __invoke()
    {
        $categories = Category::where('id', '>', 1)->withCount('products')->get();
        return CategoryWithCountResource::collection($categories);
    }
}
