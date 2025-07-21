<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Str;

class IndexController extends Controller
{
    public function __invoke()
    {
        $products = Product::all()->map(function ($product) {
            $product->description = Str::limit($product->description, 100);
            return $product;
        });

        return view('product.index', compact('products'));
    }
}
