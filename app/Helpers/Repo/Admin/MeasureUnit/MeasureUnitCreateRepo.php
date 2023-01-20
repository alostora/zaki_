<?php

namespace App\Helpers\Repo\Admin\MeasureUnit;

use App\Models\MeasureUnit;

class MeasureUnitCreateRepo extends MeasureUnitRepo
{
     public static function createMeasureUnit($request)
     {
          $validated = $request->validated();

          return MeasureUnit::create($validated);
     }
}
