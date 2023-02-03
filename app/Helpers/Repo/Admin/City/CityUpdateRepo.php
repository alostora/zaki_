<?php

namespace App\Helpers\Repo\Admin\City;

use App\Models\City;

class CityUpdateRepo extends CityRepo
{
   public static function updateCity($request, City $city)
   {
      $validated = $request->validated();

      $city->update($validated);

      return $city;
   }
}
