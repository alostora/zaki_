<?php

namespace App\Helpers\Repo\Admin\Role;

use App\Helpers\Repo\Admin\AdminRepoInterface\RepoInterface;
use App\Helpers\Repo\Repo;
use App\Models\Role;

class RoleRepo extends Repo implements RepoInterface
{

     public static $title = 'role';

     public static $createPath = 'admin/Role/create';

     public static $deletePath = 'admin/Role/destroyMany';

     /* 
     *    interface methods
     */

     public static function get($query_string)
     {
          $roles = RoleSearchRepo::searchAllRoles($query_string);

          $data = [
               'data' => $roles,
               'title' => self::$title,
               'createPath' => url(self::$createPath),
               'deletePath' => url(self::$deletePath),
          ];

          return view('Admin/Role/rolesInfo', $data);
     }

     public static function show($role)
     {
          return;
     }

     public static function create()
     {
          return view('Admin/Role/create');
     }

     public static function store($request)
     {
          RoleCreateRepo::createRole($request);

          session()->flash('success', 'Done');

          return back();
     }

     public static function edit($role)
     {
          $data['data'] = $role;

          return view('Admin/Role/edit', $data);
     }

     public static function update($request, $role)
     {
          RoleUpdateRepo::updateRole($request, $role);

          session()->flash('success', 'Done');

          return back();
     }

     public static function destroy($role)
     {
          $role->delete();

          session()->flash('warning', 'Done');

          return back();
     }

     public static function destroyMany($ids)
     {
          $ids = json_decode($ids);

          Role::destroy($ids);

          session()->flash('warning', 'Done');

          return back();
     }
}
