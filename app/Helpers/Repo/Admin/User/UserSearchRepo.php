<?php

namespace App\Helpers\Repo\Admin\User;


class UserSearchRepo extends UserRepo
{

     public static function searchAllUsers(
          $query_string = -1
     ) {
          return UserGetRepo::allUsers($query_string)->get();
     }
}
