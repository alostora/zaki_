<?php

namespace App\Helpers\Repo\Admin\Role;

use App\Models\Role;

class RoleCreateRepo extends RoleRepo
{
     public static function createRole($request)
     {
          $validated = $request->validated();

          return Role::create($validated);
     }
}
