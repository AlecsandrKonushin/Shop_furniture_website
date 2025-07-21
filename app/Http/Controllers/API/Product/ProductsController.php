<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Product\ProductsRequest;
use App\Models\Product;

class ProductsController extends Controller
{
    public function __invoke(ProductsRequest $request)
    {
        $data = $request->validated();
        $query = Product::query();

        if ((int)$data['category_id'] !== 0) {
            $query->where('category_id', $data['category_id']);
        }

        $query->where('price', '>=', $data['minPrice']);
        $query->where('price', '<=', $data['maxPrice']);

        if (!empty($data['colors'])) {
            $colors = $data['colors'];
            $query->whereHas('colors', function ($query) use ($colors) {
                $query->whereIn('colors.id', $colors);
            });
        }

        $products = $query->paginate(9);
        return response()->json($products);
    }
}
