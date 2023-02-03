<?php

namespace App\Helpers\Repo\Admin\City;

use App\Models\City;
use App\Models\Country;

class CityGetRepo extends CityRepo
{
     public static function allCities(
          $query_string = -1
     ) {
          return City::where(function ($q) use ($query_string) {

               if ($query_string != -1) {
                    $q
                         ->where('cityName', 'like', '%' . $query_string . '%')

                         ->orWhere('cityNameAr', 'like', '%' . $query_string . '%');
               }
          })
               ->orderBy('id', 'DESC');
     }

     public static function allCountryCities(
          Country $country
     ) {
          return City::where('country_id', $country->id)
               ->orderBy('id', 'DESC');
     }
}
