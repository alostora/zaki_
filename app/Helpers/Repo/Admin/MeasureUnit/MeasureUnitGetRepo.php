<?php

namespace App\Helpers\Repo\Admin\MeasureUnit;

use App\Models\MeasureUnit;

class MeasureUnitGetRepo extends MeasureUnitRepo
{
     public static function allMeasureUnits(
          $query_string = -1
     ) {
          return MeasureUnit::where(function ($q) use ($query_string) {

               if ($query_string != -1) {
                    $q
                         ->where('unitName', 'like', '%' . $query_string . '%')

                         ->orWhere('unitNameAr', 'like', '%' . $query_string . '%');
               }
          })
               ->orderBy('id', 'DESC');
     }
}
