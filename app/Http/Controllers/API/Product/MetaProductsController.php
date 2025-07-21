<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;

class MetaProductsController extends Controller
{
    public function __invoke()
    {
        $countProducts = Product::all()->count();
        $minPrice = Product::all()->min('price');
        $maxPrice = Product::all()->max('price');
        $meta = [
            'countProducts' => $countProducts,
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice,
        ];

        return response()->json($meta);
    }
}
