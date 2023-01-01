<?php

namespace App\Helpers\Repo\Admin\Permission;

use App\Models\Permission;

class PermissionGetRepo extends PermissionRepo
{
     public static function allPermissions(
          $query_string = -1
     ) {
          return Permission::where(function ($q) use ($query_string) {

               if ($query_string != -1) {
                    $q
                         ->where('permissionName', 'like', '%' . $query_string . '%')

                         ->orWhere('permissionNameAr', 'like', '%' . $query_string . '%');
               }
          })
               ->orderBy('id', 'DESC');
     }
}
