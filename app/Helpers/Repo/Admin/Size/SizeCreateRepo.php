<?php

namespace App\Helpers\Repo\Admin\Size;

use App\Models\Size;

class SizeCreateRepo extends SizeRepo
{
     public static function createSize($request)
     {
          $validated = $request->validated();

          return Size::create($validated);
     }
}
