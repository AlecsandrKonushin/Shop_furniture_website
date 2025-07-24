<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\Product\CartProductResource;
use App\Models\Product;

class CartController extends Controller
{
    public function __invoke(Product $product)
    {
        $productResource = new CartProductResource($product);
        return response()->json($productResource);
    }
}
