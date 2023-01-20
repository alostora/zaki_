<?php

namespace App\Helpers\Repo\Admin\MeasureUnit;

use App\Models\MeasureUnit;

class MeasureUnitUpdateRepo extends MeasureUnitRepo
{
     public static function updateMeasureUnit($request, MeasureUnit $measureUnit)
     {
          
        $validated = $request->validated();

        $measureUnit->update($validated);

        return $measureUnit;

     }
}
