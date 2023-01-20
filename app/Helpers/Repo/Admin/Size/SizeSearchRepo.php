<?php

namespace App\Helpers\Repo\Admin\Size;


class SizeSearchRepo extends SizeRepo
{

     public static function searchAllSizes(
          $query_string = -1
     ) {

          return SizeGetRepo::allSizes($query_string)->get();
     }
}
