<?php

namespace App\Http\Resources\API\Product;

use App\Http\Resources\API\Category\CategoryResource;
use App\Http\Resources\API\Color\ColorResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'preview_image' => $this->preview_image,
            'price' => $this->price,
            'max_count' => $this->count,
            'category' => new CategoryResource($this->category),
            'colors' => ColorResource::collection($this->colors),
        ];
    }
}
