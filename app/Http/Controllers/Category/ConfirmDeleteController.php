<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class ConfirmDeleteController extends Controller
{
    public function __invoke(Category $category)
    {
        $countConnectProducts = Product::where('category_id', $category->id)->count();
        return view('category.confirm-delete', compact('category', 'countConnectProducts'));
    }
}
