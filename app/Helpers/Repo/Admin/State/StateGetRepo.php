<?php

namespace App\Helpers\Repo\Admin\State;

use App\Models\State;

class StateGetRepo extends StateRepo
{
     public static function allStates(
          $query_string = -1
     ) {
          return State::where(function ($q) use ($query_string) {

               if ($query_string != -1) {
                    $q
                         ->where('stateName', 'like', '%' . $query_string . '%')

                         ->orWhere('stateNameAr', 'like', '%' . $query_string . '%');
               }
          })
               ->orderBy('id', 'DESC');
     }
}
