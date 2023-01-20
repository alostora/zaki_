<?php

namespace App\Helpers\Repo\Admin\User;

use App\Helpers\Repo\Admin\AdminRepoInterface\RepoInterface;
use App\Helpers\Repo\Repo;
use App\Models\User;

class UserRepo extends Repo implements RepoInterface
{

     public static $title = 'user';

     public static $createPath = 'admin/User/create';

     public static $deletePath = 'admin/User/destroyMany';

     /* 
     *    interface methods
     */

     public static function get($query_string)
     {
          $users = UserSearchRepo::searchAllUsers($query_string);

          $data = [
               'data' => $users,
               'title' => self::$title,
               'createPath' => url(self::$createPath),
               'deletePath' => url(self::$deletePath),
          ];

          return view('Admin/User/UsersInfo', $data);
     }

     public static function show($user)
     {
          return;
     }

     public static function create()
     {
          return view('Admin/User/create');
     }

     public static function store($request)
     {
          UserCreateRepo::createUser($request);

          session()->flash('success', 'Done');

          return back();
     }

     public static function edit($user)
     {
          $data['data'] = $user;

          return view('Admin/User/edit', $data);
     }

     public static function update($request, $user)
     {
          UserUpdateRepo::updateUser($request, $user);

          session()->flash('success', 'Done');

          return back();
     }

     public static function destroy($user)
     {
          $user->delete();

          session()->flash('warning', 'Done');

          return back();
     }

     public static function destroyMany($ids)
     {
          $ids = json_decode($ids);

          User::destroy($ids);

          session()->flash('warning', 'Done');

          return back();
     }
}
