<?php

namespace App\Helpers\Repo\Admin\User;

use App\Models\User;

class UserGetRepo extends UserRepo
{
     public static function allUsers(
          $query_string = -1
     ) {
          return User::where(function ($q) use ($query_string) {

               if ($query_string != -1) {
                    $q
                         ->where('name', 'like', '%' . $query_string . '%')

                         ->orWhere('email', 'like', '%' . $query_string . '%')

                         ->orWhere('phone', 'like', '%' . $query_string . '%');
               }
          })
               ->orderBy('id', 'DESC');
     }
}
