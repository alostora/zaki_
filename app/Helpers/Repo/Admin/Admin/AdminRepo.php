<?php

namespace App\Helpers\Repo\Admin\Admin;

use App\Helpers\Repo\Repo;
use App\Helpers\Repo\Admin\AdminRepoInterface\RepoInterface;
use App\Models\Admin;
use App\Models\Permission;

class AdminRepo extends Repo implements RepoInterface
{

     public static $title = 'admin';

     public static $createPath = 'admin/Admin/create';

     public static $deletePath = 'admin/Admin/destroyMany';

     /* 
     *    interface methods
     */

     public static function get($query_string = -1)
     {
          $admins = AdminSearchRepo::searchAllAdmins($query_string);

          $data = [

               'data' => $admins,

               'title' => self::$title,

               'createPath' => url(self::$createPath),
               
               'deletePath' => url(self::$deletePath),
          ];

          return view('Admin/Admin/adminsInfo', $data);
     }

     public static function show($admin)
     {
          return;
     }

     public static function create()
     {
          $data['permissions'] = Permission::get();

          return view('Admin/Admin/create', $data);
     }

     public static function store($request)
     {
          AdminCreateRepo::createAdmin($request);

          session()->flash('success', 'Done');

          return back();
     }

     public static function edit($admin)
     {
          $data['data'] = $admin;

          $data['permissions'] = Permission::get();

          return view('Admin/Admin/edit', $data);
     }

     public static function update($request, $admin)
     {
          AdminUpdateRepo::updateAdmin($request, $admin);

          session()->flash('success', 'Done');

          return back();
     }

     public static function destroy($admin)
     {
          $admin->delete();

          session()->flash('warning', 'Done');

          return back();
     }

     public static function destroyMany($ids)
     {
          $ids = json_decode($ids);

          Admin::destroy($ids);

          session()->flash('warning', 'Done');

          return back();
     }
}
