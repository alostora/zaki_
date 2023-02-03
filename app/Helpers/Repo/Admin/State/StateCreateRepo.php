<?php

namespace App\Helpers\Repo\Admin\State;

use App\Models\State;

class StateCreateRepo extends StateRepo
{
     public static function createState($request)
     {
          $validated = $request->validated();

          return State::create($validated);
     }
}
