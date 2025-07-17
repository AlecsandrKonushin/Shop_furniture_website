<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;

class CreateController extends Controller
{
    public function __invoke()
    {
        $categories = Category::where('id', '>', 1)->get();
        $colors = Color::all();
        return view('product.create', compact('categories', 'colors'));
    }
}
