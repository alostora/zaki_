<?php

namespace App\Helpers\Repo\Admin\Role;

use App\Models\Role;

class RoleUpdateRepo extends RoleRepo
{
     public static function updateRole($request, Role $role)
     {
          
        $validated = $request->validated();

        $role->update($validated);

        return $role;

     }
}
