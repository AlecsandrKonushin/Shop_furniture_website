<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;

class IndexController extends Controller
{
    public function __invoke()
    {
        $productsCount = Product::all()->count();
        $categoriesCount = Category::all()->count();
        $colorsCount = Color::all()->count();
        return view('main.index', compact('productsCount', 'categoriesCount', 'colorsCount'));
    }
}
