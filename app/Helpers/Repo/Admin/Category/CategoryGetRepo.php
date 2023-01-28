<?php

namespace App\Helpers\Repo\Admin\Category;

use App\Models\Category;

class CategoryGetRepo extends CategoryRepo
{
     public static function allCategorys(
          $query_string = -1
     ) {
          return Category::where(function ($q) use ($query_string) {

               if ($query_string != -1) {
                    $q
                         ->where('categoryName', 'like', '%' . $query_string . '%')

                         ->orWhere('categoryNameAr', 'like', '%' . $query_string . '%');
               }
          })
               ->orderBy('id', 'DESC');
     }
}
