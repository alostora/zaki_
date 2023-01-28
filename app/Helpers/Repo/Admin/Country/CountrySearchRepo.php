<?php

namespace App\Helpers\Repo\Admin\Country;


class CountrySearchRepo extends CountryRepo
{

     public static function searchAllCountries(
          $query_string = -1
     ) {

          return CountryGetRepo::allCountries($query_string)->get();
     }
}
