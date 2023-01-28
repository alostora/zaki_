<?php

namespace App\Helpers\Repo\Admin\Country;

use App\Models\Country;

class CountryGetRepo extends CountryRepo
{
     public static function allCountries(
          $query_string = -1
     ) {
          return Country::where(function ($q) use ($query_string) {

               if ($query_string != -1) {
                    $q
                         ->where('countryName', 'like', '%' . $query_string . '%')

                         ->orWhere('countryNameAr', 'like', '%' . $query_string . '%');
               }
          })
               ->orderBy('id', 'DESC');
     }
}
