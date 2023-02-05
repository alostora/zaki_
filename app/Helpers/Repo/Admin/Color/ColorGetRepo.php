<?php

namespace App\Helpers\Repo\Admin\Color;

use App\Models\Color;

class ColorGetRepo extends ColorRepo
{
     public static function allColors(
          $query_string = -1
     ) {
          return Color::where(function ($q) use ($query_string) {

               if ($query_string != -1) {
                    $q
                         ->where('colorName', 'like', '%' . $query_string . '%')

                         ->orWhere('colorNameAr', 'like', '%' . $query_string . '%')

                         ->orWhere('colorCode', 'like', '%' . $query_string . '%');
               }
          })
               ->orderBy('id', 'DESC');
     }
}
