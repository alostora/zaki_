<?php

namespace App\Helpers\Repo\Admin\Permission;

use App\Models\Permission;

class PermissionCreateRepo extends PermissionRepo
{
     public static function createPermission($request)
     {
          $validated = $request->validated();

          $permission = permission::create($validated);

          self::createMigrationRoles($permission, $validated['permissions']);
     }

     public static function createMigrationRoles($permission, array $roles)
     {

          foreach ($roles as $key => $perm) {

               $str = explode(':', $perm);

               $data[$key]['migration_id'] = $str[0];

               $data[$key]['role_id'] = $str[1];

               $data[$key]['permission_id'] = $permission->id;
          }

          $permission->migrationRoles()->createMany($data);

     }
}
