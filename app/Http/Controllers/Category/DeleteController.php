<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class DeleteController extends Controller
{
    public function __invoke(Category $category)
    {
        DB::transaction(function () use ($category) {
            Product::where('category_id', $category->id)
                ->update(['category_id' => 1]);

            $category->delete();
        });

        return redirect()->route('category.index');
    }
}
