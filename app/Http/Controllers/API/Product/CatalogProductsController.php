<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Product\CatalogProductsRequest;
use App\Models\Product;

class CatalogProductsController extends Controller
{
    public function __invoke(CatalogProductsRequest $request)
    {
        $data = $request->validated();
        $products = Product::paginate(9)->where('category_id', $data['category_id']);
        return response()->json($products);
    }
}
