<?php

namespace App\Helpers\Repo\Admin\Admin;


class AdminSearchRepo extends AdminRepo
{

     public static function searchAllAdmins(
          $query_string = -1
     ) {
          return AdminGetRepo::allAdmins($query_string)->get();
     }
}
