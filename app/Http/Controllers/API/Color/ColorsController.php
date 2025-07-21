<?php

namespace App\Http\Controllers\API\Color;

use App\Http\Controllers\Controller;
use App\Models\Color;

class ColorsController extends Controller
{
    public function __invoke()
    {
        $colors = Color::all();
        return response()->json($colors);
    }
}
