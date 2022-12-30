<?php

namespace App\Helpers\Repo\Admin\Admin;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminUpdateRepo extends AdminRepo
{
     public function updateAdmin($request, Admin $admin)
     {

          $validated = $request->except(['_token','confirmPassword']);

          if (empty($validated['password'])) {

               unset($validated['password']);
          } else {

               $validated['password'] = Hash::make($validated['password']);
          }

          $admin->update($validated);
     }
}
