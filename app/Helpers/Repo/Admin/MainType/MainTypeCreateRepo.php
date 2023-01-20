<?php

namespace App\Helpers\Repo\Admin\MainType;

use App\Models\MainType;

class MainTypeCreateRepo extends MainTypeRepo
{
     public static function createMainType($request)
     {
          $validated = $request->validated();

          return MainType::create($validated);
     }
}
