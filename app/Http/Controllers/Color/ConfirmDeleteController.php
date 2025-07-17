<?php

namespace App\Http\Controllers\Color;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\ColorProduct;

class ConfirmDeleteController extends Controller
{
    public function __invoke(Color $color)
    {
        $countConnectProducts = ColorProduct::where('color_id', $color->id)->count();
        return view('color.confirm-delete', compact('color', 'countConnectProducts'));
    }
}
