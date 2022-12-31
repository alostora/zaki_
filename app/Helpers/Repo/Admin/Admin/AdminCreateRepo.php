<?php

namespace App\Helpers\Repo\Admin\Admin;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminCreateRepo extends AdminRepo
{
     public static function createAdmin($request)
     {

          $validated = $request->validated();

          $validated['password'] = Hash::make($validated['password']);

          Admin::create($validated);
     }
}
