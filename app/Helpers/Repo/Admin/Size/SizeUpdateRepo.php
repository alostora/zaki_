<?php

namespace App\Helpers\Repo\Admin\Size;

use App\Models\Size;

class SizeUpdateRepo extends SizeRepo
{
     public static function updateSize($request, Size $size)
     {
          
        $validated = $request->validated();

        $size->update($validated);

        return $size;

     }
}
