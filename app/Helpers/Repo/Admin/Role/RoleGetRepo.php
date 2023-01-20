<?php

namespace App\Helpers\Repo\Admin\Role;

use App\Models\Role;

class RoleGetRepo extends RoleRepo
{
     public static function allRoles(
          $query_string = -1
     ) {
          return Role::where(function ($q) use ($query_string) {

               if ($query_string != -1) {
                    $q
                         ->where('roleName', 'like', '%' . $query_string . '%')

                         ->orWhere('roleNameAr', 'like', '%' . $query_string . '%');
               }
          })
               ->orderBy('id', 'DESC');
     }
}
