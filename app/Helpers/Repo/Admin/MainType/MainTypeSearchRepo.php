<?php

namespace App\Helpers\Repo\Admin\MainType;


class MainTypeSearchRepo extends MainTypeRepo
{

     public static function searchAllMainTypes(
          $query_string = -1
     ) {

          return MainTypeGetRepo::allMainTypes($query_string)->get();
     }
}
