<?php

namespace App\Helpers\Repo\Admin\SubCategory;


class SubCategorySearchRepo extends SubCategoryRepo
{

     public static function searchAllSubCategorys(
          $query_string = -1
     ) {
          return SubCategoryGetRepo::allSubCategorys($query_string)->get();
     }
}
