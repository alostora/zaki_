<?php

namespace App\Helpers\Repo\Admin\Color;


class ColorSearchRepo extends ColorRepo
{

     public static function searchAllColors(
          $query_string = -1
     ) {

          return ColorGetRepo::allColors($query_string)->get();
     }
}
