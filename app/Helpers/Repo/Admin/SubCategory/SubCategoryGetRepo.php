<?php

namespace App\Helpers\Repo\Admin\SubCategory;

use App\Models\SubCategory;

class SubCategoryGetRepo extends SubCategoryRepo
{
     public static function allSubCategorys(
          $query_string = -1
     ) {
          return SubCategory::where(function ($q) use ($query_string) {

               if ($query_string != -1) {
                    $q
                         ->where('subCategoryName', 'like', '%' . $query_string . '%')

                         ->orWhere('subCategoryNameAr', 'like', '%' . $query_string . '%');
               }
          })
               ->orderBy('id', 'DESC');
     }
}
