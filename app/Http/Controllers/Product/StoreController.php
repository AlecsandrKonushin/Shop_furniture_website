<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        if (isset($data['product_images'])) {
            $product_images = $data['product_images'];
        } else {
            foreach (session('temp_product_images') as $product_image) {
                $fileName = basename($product_image);
                $newPath = 'images/' . $fileName;
                Storage::disk('public')->move($product_image, $newPath);
                $product_images[] = $newPath;
            }

            session()->forget('temp_product_images');
        }

        if (isset($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put('images', $data['preview_image']);
        } else {
            $tempPath = session('temp_preview');
            $fileName = basename($tempPath);
            $newPath = 'images/' . $fileName;

            Storage::disk('public')->move($tempPath, $newPath);
            $data['preview_image'] = $newPath;

            session()->forget('temp_preview');
        }

        $colorsIds = $data['colors'];
        unset($data['colors'], $data['product_images']);

        $product = Product::firstOrCreate([
            'title' => $data['title'],
        ], $data);

        foreach ($colorsIds as $colorId) {
            ColorProduct::firstOrCreate([
                'product_id' => $product->id,
                'color_id' => $colorId
            ]);
        }

        foreach ($product_images as $image) {
            $filePath = Storage::disk('public')->put('images', $image);
            ProductImages::firstOrCreate([
                'product_id' => $product->id,
                'file_path' => $filePath
            ]);
        }

        Product::firstOrCreate($data);

        return redirect()->route('admin.product.index');
    }
}
