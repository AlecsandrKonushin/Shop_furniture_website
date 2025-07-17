<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();

        if ($request->hasFile('preview_image')) {
            $data['preview_image'] = Storage::disk('public')->put('images', $data['preview_image']);
        } else {
            $data['preview_image'] = $product->preview_image;
        }

        $deletedIds = $request->input('deleted_images', []);

        foreach ($deletedIds as $deletedId) {
            $image = ProductImages::find($deletedId);

            if ($image) {
                Storage::disk('public')->delete($image->file_path);
                $image->delete();
            }
        }

        if ($request->hasFile('product_images')) {
            foreach ($data['product_images'] as $key => $value) {
                $filePath = Storage::disk('public')->put('images', $value);
                ProductImages::firstOrCreate([
                    'product_id' => $product->id,
                    'file_path' => $filePath,
                ]);
            }
        }

        $colorsIds = $data['colors'];
        unset($data['colors'], $data['product_images']);

        $product->colors()->detach();

        foreach ($colorsIds as $colorIds) {
            ColorProduct::firstOrCreate([
                'product_id' => $product->id,
                'color_id' => $colorIds,
            ]);
        }

        $product->update($data);
        return redirect()->route('admin.product.show', $product);
    }
}
