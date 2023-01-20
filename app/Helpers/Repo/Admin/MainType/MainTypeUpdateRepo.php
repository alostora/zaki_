<?php

namespace App\Helpers\Repo\Admin\MainType;

use App\Models\MainType;

class MainTypeUpdateRepo extends MainTypeRepo
{
     public static function updateMainType($request, MainType $mainType)
     {
          
        $validated = $request->validated();

        $mainType->update($validated);

        return $mainType;

     }
}
