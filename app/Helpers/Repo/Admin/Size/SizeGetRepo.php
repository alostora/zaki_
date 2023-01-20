<?php

namespace App\Helpers\Repo\Admin\Size;

use App\Models\Size;

class SizeGetRepo extends SizeRepo
{
     public static function allSizes(
          $query_string = -1
     ) {
          return Size::where(function ($q) use ($query_string) {

               if ($query_string != -1) {
                    $q
                         ->where('sizeName', 'like', '%' . $query_string . '%')

                         ->orWhere('sizeNameAr', 'like', '%' . $query_string . '%');
               }
          })
               ->orderBy('id', 'DESC');
     }
}
