<?php

namespace App\Helpers\Repo\Admin\Permission;

use App\Helpers\Repo\Admin\AdminRepoInterface\RepoInterface;
use App\Helpers\Repo\Repo;
use App\Models\Migration;
use App\Models\Permission;
use App\Models\Role;

class PermissionRepo extends Repo implements RepoInterface
{

     public static $title = 'permission';

     public static $createPath = 'admin/Permission/create';

     public static $deletePath = 'admin/Permission/destroyMany';

     /* 
     * interface methods
     */

     public static function get($query_string = -1)
     {
          $permission = PermissionSearchRepo::searchAllPermissions($query_string);

          $data = [
               'data' => $permission,
               'title' => self::$title,
               'createPath' => url(self::$createPath),
               'deletePath' => url(self::$deletePath),
          ];

          return view('Admin/Permission/permissionsInfo', $data);
     }

     public static function show($permission)
     {
          return;
     }

     public static function create()
     {
          $data['migrations'] = Migration::get();

          $data['roles'] = Role::get();

          return view('Admin/Permission/create', $data);
     }

     public static function store($request)
     {
          PermissionCreateRepo::createPermission($request);

          session()->flash('success', 'Done');

          return back();
     }

     public static function edit($permission)
     {
          $data = PermissionRepo::selectedRoles($permission);

          return view('Admin/Permission/edit', $data);
     }

     public static function update($request, $permission)
     {
          PermissionUpdateRepo::updatePermission($request, $permission);

          session()->flash('success', 'Done');

          return back();
     }

     public static function destroy($permission)
     {
          $permission->delete();

          session()->flash('warning', 'Done');

          return back();
     }

     public static function destroyMany($ids)
     {
          $ids = json_decode($ids);

          Permission::destroy($ids);

          session()->flash('warning', 'Done');

          return back();
     }

     public static function selectedRoles($permission)
     {
          $data = [
               'data' => $permission,
               'migrations' => Migration::get(),
               'roles' => Role::get(),
          ];

          foreach ($data['migrations'] as $mig) {
               if (!empty($data['roles'])) {
                    foreach ($data['roles'] as $role) {
                         if (isset($permission->migrationRoles)) {
                              foreach ($permission->migrationRoles as $selected_role) {
                                   if ($selected_role->migration_id == $mig->id && $selected_role->role_id == $role->id) {
                                        $data['selected'][$mig->name][$role->id] = 'selected';
                                   }
                              }
                         }
                    }
               }
          }

          return $data;
     }
}
