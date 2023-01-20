<?php

namespace App\Helpers\Repo\Admin\Role;


class RoleSearchRepo extends RoleRepo
{

     public static function searchAllRoles(
          $query_string = -1
     ) {

          return RoleGetRepo::allRoles($query_string)->get();
     }
}
