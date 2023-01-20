<?php

namespace App\Helpers\Repo\Admin\User;

use App\Models\User;

class UserCreateRepo extends UserRepo
{
     public static function createUser($request)
     {
          $validated = $request->validated();

          return User::create($validated);
     }
}
