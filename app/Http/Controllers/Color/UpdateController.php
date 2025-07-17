<?php

namespace App\Http\Controllers\Color;

use App\Http\Controllers\Controller;
use App\Models\Color;

class UpdateController extends Controller
{
    public function __invoke(\App\Http\Requests\Color\UpdateRequest $request, Color $color)
    {
        $data = $request->validated();
        $color->update($data);
        return redirect()->route('admin.color.index');
    }
}
