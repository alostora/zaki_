<?php

namespace App\Helpers\Repo\Admin\City;

use App\Models\City;

class CityCreateRepo extends CityRepo
{
     public static function createCity($request)
     {
          $validated = $request->validated();

          return City::create($validated);
     }
}
