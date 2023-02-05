<?php

namespace App\Helpers\Repo\Admin\Color;

use App\Models\Color;

class ColorUpdateRepo extends ColorRepo
{
     public static function updateColor($request, Color $color)
     {
          
        $validated = $request->validated();

        $color->update($validated);

        return $color;

     }
}
