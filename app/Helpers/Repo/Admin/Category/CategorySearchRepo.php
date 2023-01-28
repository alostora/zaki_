<?php

namespace App\Helpers\Repo\Admin\Category;


class CategorySearchRepo extends CategoryRepo
{

     public static function searchAllCategorys(
          $query_string = -1
     ) {
          return CategoryGetRepo::allCategorys($query_string)->get();
     }
}
