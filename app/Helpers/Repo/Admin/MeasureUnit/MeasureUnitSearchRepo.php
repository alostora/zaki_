<?php

namespace App\Helpers\Repo\Admin\MeasureUnit;


class MeasureUnitSearchRepo extends MeasureUnitRepo
{

     public static function searchAllMeasureUnits(
          $query_string = -1
     ) {

          return MeasureUnitGetRepo::allMeasureUnits($query_string)->get();
     }
}
