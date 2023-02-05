<?php

namespace App\Helpers\Repo\Admin\Brand;


class BrandSearchRepo extends BrandRepo
{

     public static function searchAllBrands(
          $query_string = -1
     ) {

          return BrandGetRepo::allBrands($query_string)->get();
     }
}
