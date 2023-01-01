<?php

namespace App\Helpers\Repo\Admin\Permission;


class PermissionSearchRepo extends PermissionRepo
{

     public static function searchAllPermissions(
          $query_string = -1
     ) {

          return PermissionGetRepo::allPermissions($query_string)->get();
     }
}
