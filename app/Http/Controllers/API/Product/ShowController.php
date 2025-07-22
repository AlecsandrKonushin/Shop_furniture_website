<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\Product\ProductResource;
use App\Models\Product;

class ShowController extends Controller
{
    public function __invoke(Product $product)
    {
        $productResource = new ProductResource($product);
        return response()->json($productResource);
    }
}
