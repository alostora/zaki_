<?php

namespace App\Helpers\Repo\Admin\Color;

use App\Models\Color;

class ColorCreateRepo extends ColorRepo
{
     public static function createColor($request)
     {
          $validated = $request->validated();

          return Color::create($validated);
     }
}
