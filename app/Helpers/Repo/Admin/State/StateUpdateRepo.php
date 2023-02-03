<?php

namespace App\Helpers\Repo\Admin\State;

use App\Models\State;

class StateUpdateRepo extends StateRepo
{
   public static function updateState($request, State $state)
   {
      $validated = $request->validated();

      $state->update($validated);

      return $state;
   }
}
