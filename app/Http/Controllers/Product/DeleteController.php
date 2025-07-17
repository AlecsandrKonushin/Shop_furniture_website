<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;

class DeleteController extends Controller
{
    public function __invoke(Product $product)
    {
        $product->colors()->detach();
        $product->product_images()->delete();
        $product->delete();
        return redirect()->route('admin.product.index');
    }
}
