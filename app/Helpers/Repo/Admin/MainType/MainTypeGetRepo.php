<?php

namespace App\Helpers\Repo\Admin\MainType;

use App\Models\MainType;

class MainTypeGetRepo extends MainTypeRepo
{
     public static function allMainTypes(
          $query_string = -1
     ) {
          return MainType::where(function ($q) use ($query_string) {

               if ($query_string != -1) {
                    $q
                         ->where('typeName', 'like', '%' . $query_string . '%')

                         ->orWhere('typeNameAr', 'like', '%' . $query_string . '%');
               }
          })
               ->orderBy('id', 'DESC');
     }
}
