<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ConfirmDeleteController extends Controller
{
    public function __invoke(Product $product)
    {
        return view('product.confirm-delete', compact('product'));
    }
}
