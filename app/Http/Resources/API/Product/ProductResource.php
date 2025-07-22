<?php

namespace App\Http\Resources\API\Product;

use App\Http\Resources\API\Category\CategoryResource;
use App\Http\Resources\API\Color\ColorResource;
use App\Http\Resources\API\Image\ImageResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'preview_image' => $this->preview_image,
            'price' => $this->price,
            'count' => $this->count,
            'category' => new CategoryResource($this->category),
            'colors' => ColorResource::collection($this->colors),
            'product_images' => ImageResource::collection($this->product_images)
        ];
    }
}
