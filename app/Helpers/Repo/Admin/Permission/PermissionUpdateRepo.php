<?php

namespace App\Helpers\Repo\Admin\Permission;

use App\Models\Permission;

class PermissionUpdateRepo extends PermissionRepo
{
     public static function updatePermission($request, Permission $permission)
     {
          
        $validated = $request->validated();

        $permission->permissionName = $validated['permissionName'];

        $permission->permissionNameAr = $validated['permissionNameAr'];

        $permission->save();

        $permission->migrationRoles()->delete();

        PermissionCreateRepo::createMigrationRoles($permission, $validated['permissions']);

     }
}
