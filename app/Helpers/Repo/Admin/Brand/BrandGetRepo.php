<?php

namespace App\Helpers\Repo\Admin\Brand;

use App\Models\Brand;

class BrandGetRepo extends BrandRepo
{
     public static function allBrands(
          $query_string = -1
     ) {
          return Brand::where(function ($q) use ($query_string) {

               if ($query_string != -1) {
                    $q
                         ->where('brandName', 'like', '%' . $query_string . '%')

                         ->orWhere('brandNameAr', 'like', '%' . $query_string . '%');
               }
          })
               ->orderBy('id', 'DESC');
     }
}
