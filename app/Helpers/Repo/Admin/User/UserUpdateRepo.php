<?php

namespace App\Helpers\Repo\Admin\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserUpdateRepo extends UserRepo
{
   public static function updateUser($request, User $user)
   {
      $validated = $request->validated();

      if ($validated['password'] == null) {

         unset($validated['password']);
      } else {

         $validated['password'] = Hash::make($validated['password']);
      }

      $user->update($validated);

      return $user;
   }
}
