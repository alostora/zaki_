<?php

namespace App\Helpers\Repo\Admin\City;


class CitySearchRepo extends CityRepo
{

     public static function searchAllCities(
          $query_string = -1
     ) {

          return CityGetRepo::allCities($query_string)->get();
     }
     
     public static function getCountryCities(
          $country
     ) {
          return CityGetRepo::allCountryCities($country)->get();
     }
}
