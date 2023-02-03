<?php

namespace App\Helpers\Repo\Admin\State;


class StateSearchRepo extends StateRepo
{

     public static function searchAllStates(
          $query_string = -1
     ) {

          return StateGetRepo::allStates($query_string)->get();
     }
}
