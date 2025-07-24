<?php

namespace App\Http\Controllers\API\Color;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\Color\ColorResource;
use App\Models\Color;

class ColorsController extends Controller
{
    public function __invoke()
    {
        $colors = ColorResource::collection(Color::all());
        return response()->json($colors);
    }
}
