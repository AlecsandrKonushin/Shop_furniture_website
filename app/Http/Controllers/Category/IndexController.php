<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class IndexController extends Controller
{
    public function __invoke()
    {
        $categories = Category::where('id', '>', 1)->get();
        return view('category.index', compact('categories'));
    }
}
